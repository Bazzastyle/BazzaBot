<?php

declare(strict_types=1);

namespace BazzaBot;

use Amp\ByteStream\{BufferException, StreamException};
use Amp\Http\Client\{Form, HttpClient, HttpClientBuilder, HttpException, Request};
use BazzaBot\Config\EnvLoader;
use BazzaBot\Exceptions\{ConfigurationException, TelegramApiException};
use BazzaBot\Logging\ChannelLogger;
use Psr\Log\{LoggerInterface, NullLogger};
use stdClass;

use function Amp\delay;

class Client extends Api {
	use Types;

	public ?EasyVars $easy = null;
	public readonly Database $db;

	private readonly LoggerInterface $logger;
	private readonly LoggerInterface $webhookLogger;
	private readonly array $env;
	private readonly HttpClient $httpClient;
	private readonly string $token;
	private readonly string $endpoint;
	private bool $jsonPayload;

	public function __construct (
		array $env,
		?LoggerInterface $logger = null,
		?Database $database = null,
		?HttpClient $httpClient = null,
		?string $envFilePath = null,
	) {
		$rawLogger = $logger ?? new NullLogger();
		$this->env = EnvLoader::merge( $env, $envFilePath );

		if ( empty( $this->env[ 'botToken' ] ) ) throw new ConfigurationException( 'Missing required "botToken" in configuration.' );

		// 'logging.channels' lets env.php pick which components get to log at all (e.g. only
		// ['database'] while debugging a query issue); null/omitted means every channel is enabled.
		$channels            = $this->env[ 'logging' ][ 'channels' ] ?? null;
		$this->logger        = new ChannelLogger( $rawLogger, 'api', $channels );
		$this->webhookLogger = new ChannelLogger( $rawLogger, 'webhook', $channels );

		$this->token       = $this->env[ 'botToken' ];
		$this->endpoint    = ( $this->env[ 'endpoint' ] ?? 'https://api.telegram.org/bot' ) . $this->token . '/';
		$this->jsonPayload = (bool) ( $this->env[ 'jsonPlayload' ] ?? false );
		$this->httpClient  = $httpClient ?? HttpClientBuilder::buildDefault();
		$this->db          = $database ?? new Database( $this->env[ 'database' ] ?? [], new ChannelLogger( $rawLogger, 'database', $channels ) );
	}

	/**
	 * Make a request to the Bot API.
	 *
	 * @param string $method The method of the Bot API
	 * @param array $args Arguments for the method of the Bot API
	 *
	 * @throws TelegramApiException on transport-level failures (connection, timeout, stream errors)
	 *                              once all retry attempts have been exhausted. Application-level
	 *                              Telegram errors (HTTP 200/4xx with "ok":false in the body) are
	 *                              still returned as a stdClass, unchanged, so existing call sites
	 *                              checking ->ok keep working.
	 */
	public function Request ( string $method, array $args = [] ) : stdClass {
		if ( $this->jsonPayload ) return $this->respondViaJsonPayload( $method, $args );

		$maxAttempts = (int) ( $this->env[ 'http' ][ 'maxRetries' ] ?? 3 );
		$attempt     = 0;
		$start       = hrtime( true );

		while ( true ) {
			$attempt++;

			try {
				$response   = $this->httpClient->request( $this->buildRequest( $method, $args ) );
				$resultHttp = $response->getBody()->buffer();
				$resultJson = $this->decodeResponse( $resultHttp );

				if ( $this->isRateLimited( $resultJson ) && $attempt < $maxAttempts ) {
					$retryAfter = $resultJson->parameters->retry_after ?? ( 2 ** $attempt );
					$this->logger->warning( 'Telegram rate limit hit, retrying', [ 'method' => $method, 'attempt' => $attempt, 'retry_after' => $retryAfter ] );
					delay( (float) $retryAfter );
					continue;
				}

				$durationMs = ( hrtime( true ) - $start ) / 1e6;
				$this->logger->debug( 'Telegram API call completed', [ 'method' => $method, 'duration_ms' => $durationMs, 'ok' => $resultJson->ok ?? null ] );

				if ( ( $resultJson->ok ?? true ) === false ) {
					$this->logger->warning( 'Telegram API returned an error', [
						'method'      => $method,
						'error_code'  => $resultJson->error_code ?? null,
						'description' => $resultJson->description ?? null,
					] );
				}

				return $resultJson;
			}
			catch ( BufferException|StreamException|HttpException $e ) {
				if ( $attempt < $maxAttempts ) {
					$this->logger->warning( 'Telegram API transport error, retrying', [ 'method' => $method, 'attempt' => $attempt, 'error' => $e->getMessage() ] );
					delay( (float) min( 2 ** $attempt, 10 ) );
					continue;
				}

				$this->logger->error( 'Telegram API transport error, retries exhausted', [ 'method' => $method, 'error' => $e->getMessage() ] );

				throw new TelegramApiException(
					message: "Transport error calling {$method}: {$e->getMessage()}",
					method: $method,
					isRetryable: true,
					previous: $e,
				);
			}
		}
	}

	private function buildRequest ( string $method, array $args ) : Request {
		$request = new Request( $this->endpoint . $method, 'POST' );
		$body    = new Form;

		foreach ( $args as $name => $value ) {
			if ( $value instanceof InputFile ) $body->addFile( $name, $value->getPath() );
			else $body->addField( $name, (string) $value );
		}

		$request->setBody( $body );
		$request->setTcpConnectTimeout( (float) ( $this->env[ 'http' ][ 'connectTimeout' ] ?? 5.0 ) );
		$request->setTlsHandshakeTimeout( (float) ( $this->env[ 'http' ][ 'tlsTimeout' ] ?? 5.0 ) );
		$request->setTransferTimeout( (float) ( $this->env[ 'http' ][ 'transferTimeout' ] ?? 30.0 ) );
		$request->setInactivityTimeout( (float) ( $this->env[ 'http' ][ 'inactivityTimeout' ] ?? 15.0 ) );

		return $request;
	}

	private function decodeResponse ( string $resultHttp ) : stdClass {
		$resultJson = json_decode( $resultHttp );
		if ( $resultJson instanceof stdClass ) return $resultJson;

		return (object) [ 'ok' => false, 'error_code' => json_last_error(), 'description' => json_last_error_msg(), 'json_error' => true, 'result' => $resultHttp ];
	}

	private function isRateLimited ( stdClass $resultJson ) : bool {
		return ( $resultJson->ok ?? true ) === false && ( $resultJson->error_code ?? null ) === 429;
	}

	private function respondViaJsonPayload ( string $method, array $args ) : stdClass {
		$args[ 'method' ] = $method;
		$request = json_encode( $args );
		ob_start();
		header( 'Content-Type: application/json' );
		header( 'Connection: close' );
		header( 'Content-Length: ' . strlen( $request ) );
		echo $request;
		ob_end_flush();
		ob_flush();
		flush();
		$this->jsonPayload = false;

		return $this->getUpdate();
	}

	/**
	 * @return stdClass The update received from the webhook.
	 */
	public function getUpdate ( ?string $body = null ) : stdClass {
		$raw    = $body ?? file_get_contents( 'php://input' );
		$update = json_decode( $raw );

		if ( ! $update instanceof stdClass ) {
			$this->webhookLogger->warning( 'Received invalid JSON payload for update', [ 'json_error' => json_last_error_msg() ] );
			throw new TelegramApiException( 'Invalid or empty JSON payload received for update', method: 'getUpdate' );
		}

		$this->easy = new EasyVars( $update, $this->webhookLogger );

		return $update;
	}

	/**
	 * Make var_export() and send it in the actual chat_id
	 *
	 * @param int $chat_id for the target chat
	 * @param mixed,... $var unlimited optional variable to send
	 *
	 * @return bool true if can send message, otherwise false
	 */
	public static function debug ( mixed ...$vars ) : bool {
		foreach ( $vars as $debug ) {
			print_r( $debug );
			error_log( var_export( $debug, true ) );

			foreach ( str_split( var_export( $debug, true ), 4050 ) as $value ) {
				$client = new self( env: self::$env );
				if ( $client->sendMessage( chat_id: self::$env['logChat'], text: "Debug:" . PHP_EOL . "<pre><code class='language-php'>" . htmlspecialchars( $value ) . "</code></pre>", parse_mode: "html" )->ok === false ) return false;
			}
		}

		return true;
	}

	/**
     * cURL function that sends HTTP requests and returns the response.
     *
     * @param string $url The URL to which the request is sent.
     * @param string $request The HTTP request method (GET, POST, etc.).
     * @param array $args (optional) An array of query parameters for GET requests or the request body for POST requests.
     * @param array $header (optional) An array of HTTP headers to include in the request.
     * @return string The response from the server.
     */
    public static function cURL( string $url, string $request = "GET", ?array $args = [], ?array $header = [] ) {
      $curl = curl_init();

      $array = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => $request,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
        CURLOPT_HTTPHEADER     => $header,
      ];

      if ( $request === "GET" ) $array[ CURLOPT_URL ] = ! empty( $args ) ? "$url?" . http_build_query( $args ) : $url;
      else {
        $array[ CURLOPT_URL ] = $url;
        if ( ! empty( $args ) ) $array[ CURLOPT_POSTFIELDS ] = json_encode( $args );
      }

      curl_setopt_array( $curl, $array );
      $response = curl_exec( $curl );
      $err = curl_error( $curl );
      curl_close( $curl );

      if ( $err ) return "cURL Error #: $err";

      return $response;
    }

}
