<?php

	namespace BazzaBot;

	use Amp\ByteStream\BufferException;
	use Amp\ByteStream\StreamException;
	use Amp\Http\Client\Form;
	use Amp\Http\Client\HttpClient;
	use Amp\Http\Client\HttpClientBuilder;
	use Amp\Http\Client\Request;
	use stdClass;

	class Client extends Api {
    use Types;

		public EasyVars $easy;
    public Database $db;

		private bool $json_payload;
		private string $endpoint;
		private HttpClient $httpClient;
		private string $token;

		public static array $env;

		public function __construct ( array $env ) {
			self::$env = $env;

			$this->token        = $env['botToken'];
			$this->endpoint     = ( $env['endpoint'] ?? 'https://api.telegram.org/bot' ) . $this->token . "/";
			$this->json_payload = $env['jsonPlayload'] ?? FALSE;
			$this->httpClient   = HttpClientBuilder::buildDefault();
			$this->db           = new Database( self::$env['database'] );
		}

		/**
		 * @return \stdClass of update received from webhook
		 */
		public function Request ( string $method, array $args = [] ) {
			if ( $this->json_payload ) {
				$args[ "method" ] = $method;
				$request = json_encode( $args );
				ob_start();
				header( "Content-Type: application/json" );
				header( "Connection: close" );
				header( "Content-Length: " . strlen( $request ) );
				echo $request;
				ob_end_flush();
				ob_flush();
				flush();
				$this->json_payload = false;

				return $this->getUpdate();
			}
			else {
				try {
					$request = new Request( $this->endpoint . $method, 'POST' );
					$body    = new Form;

					foreach ( $args as $name => $value ) {
						if ( $value instanceof InputFile ) $body->addFile( $name, $value->getPath() );
						else $body->addField( $name, $value );
					}

					$request->setBody( $body );
					$response = $this->httpClient->request( $request );
					$resultHttp = $response->getBody()->buffer();
				}
        catch ( BufferException|StreamException  $e ) {
					$resultHttp = json_encode( [ "ok" => false, "error_code" => $e->getCode(), "description" => $e->getMessage(), "http_error" => true ] );
				}

				$resultJson = json_decode( $resultHttp );
				if ( $resultJson === null ) {
					$resultJson = json_decode( json_encode( [ "ok" => false, "error_code" => json_last_error(), "description" => json_last_error_msg(), "json_error" => true, "result" => $resultHttp ] ) );
				}

				return $resultJson;
			}
		}

		/**
		 * Make a request to Bot API
		 *
		 * @param string $method The method of Bot API
		 * @param array $args Argument for the method of Bot API
		 *
		 * @return \stdClass getUpdate if jsonPayload, otherwise response of Telegram
		 */
		public function getUpdate ( ?string $body = null ) : ?stdClass {
			$update = isset( $body ) ? json_decode( $body ) : json_decode( file_get_contents( "php://input" ) );
			$this->easy = new EasyVars( $update );

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
    public function cURL( string $url, string $request = "GET", ?array $args = [], ?array $header = [] ) {
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
