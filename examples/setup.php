<?php

declare(strict_types=1);

/**
 * Pagina web di setup del webhook per il bot configurato in questa stessa
 * directory (examples/.env): precompila token/URL/secret da lì e mostra lo
 * stato attuale del webhook. Il token può comunque essere sovrascritto a
 * mano nel form (es. per una prova al volo senza toccare il .env).
 *
 * Questa pagina configura UN bot alla volta — non permette di impostare più
 * token dallo stesso codice sorgente. Per più bot che condividono lo stesso
 * webhook.php, vedi la sezione "Più bot, stesso codice" nel README (token
 * risolto per richiesta da "?api=<token>" nell'URL del webhook): in quel
 * caso usa questa pagina una volta per ciascun bot, impostando come URL
 * ".../webhook.php?api=<token del bot>".
 *
 * Sicurezza: questa pagina permette di cambiare il webhook del bot
 * configurato in examples/.env. Non esporla pubblicamente senza protezione:
 * imposta la variabile d'ambiente SETUP_ACCESS_TOKEN per richiedere
 * ?access_token=... ad ogni richiesta, oppure limita l'accesso a livello di
 * webserver/IP, oppure elimina il file dopo l'uso.
 */

require __DIR__ . '/../vendor/autoload.php';

use Bazzastyle\BazzaBot\Config\Config;
use Bazzastyle\BazzaBot\Http\{InputFile, TelegramClient};
use Bazzastyle\BazzaBot\RateLimit\TelegramRateLimiter;
use Bazzastyle\BazzaBot\Update\UpdateType;
use Psr\Log\NullLogger;

const ENV_PATH = __DIR__ . '/.env';

function enforceAccessGate(): void
{
    $required = getenv('SETUP_ACCESS_TOKEN');
    if ($required === false || $required === '') {
        return; // no gate configured: open access, matching a quick local/dev setup
    }

    $provided = (string) ($_GET['access_token'] ?? $_POST['access_token'] ?? '');
    if (!hash_equals($required, $provided)) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=utf-8');
        exit("Accesso negato: parametro access_token mancante o errato.\n");
    }
}

function clientFor(string $token): TelegramClient
{
    return new TelegramClient($token, new TelegramRateLimiter(), new NullLogger());
}

enforceAccessGate();

$envToken = null;
$envSecret = '';
if (is_file(ENV_PATH)) {
    $envConfig = Config::fromEnvFile(ENV_PATH);
    $envToken = $envConfig->getString('TELEGRAM_BOT_TOKEN');
    $envSecret = (string) $envConfig->getString('TELEGRAM_WEBHOOK_SECRET', '');
}

$isAjaxOrPost = $_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['ajax']);

if ($isAjaxOrPost) {
    header('Content-Type: application/json');

    $token = trim((string) ($_POST['token'] ?? $_GET['token'] ?? $envToken ?? ''));

    if ($token === '') {
        echo json_encode(['ok' => false, 'description' => 'Nessun token fornito (examples/.env mancante o TELEGRAM_BOT_TOKEN vuoto).']);
        exit;
    }

    $client = clientFor($token);

    // Prefill request: current webhook info + .env defaults, so il form si
    // popola da solo al caricamento della pagina.
    if (isset($_GET['ajax'])) {
        $info = $client->getWebhookInfo();
        $result = $info->ok ? $info->result : null;

        echo json_encode([
            'ok' => $info->ok,
            'description' => $info->description,
            'token' => $token,
            'url' => $result->url ?? '',
            'secret_token' => $envSecret,
            'allowed_updates' => $result->allowed_updates ?? [],
            'webhook_info' => $result,
        ]);
        exit;
    }

    // Remove webhook.
    if (isset($_POST['remove'])) {
        $response = $client->deleteWebhook(drop_pending_updates: isset($_POST['drop_pending_updates']));
        echo json_encode(['ok' => $response->ok, 'description' => $response->description]);
        exit;
    }

    // Set webhook.
    $certificate = null;
    if (!empty($_FILES['certificate']['tmp_name']) && is_uploaded_file($_FILES['certificate']['tmp_name'])) {
        $certificate = new InputFile($_FILES['certificate']['tmp_name'], $_FILES['certificate']['name'] ?? null);
    }

    $allowedUpdates = isset($_POST['allowed_updates']) ? array_values((array) $_POST['allowed_updates']) : null;

    $response = $client->setWebhook(
        url: (string) ($_POST['url'] ?? ''),
        certificate: $certificate,
        ip_address: !empty($_POST['ip_address']) ? (string) $_POST['ip_address'] : null,
        max_connections: !empty($_POST['max_connections']) ? (int) $_POST['max_connections'] : null,
        allowed_updates: $allowedUpdates,
        drop_pending_updates: isset($_POST['drop_pending_updates']),
        secret_token: !empty($_POST['secret_token']) ? (string) $_POST['secret_token'] : null,
    );

    echo json_encode(['ok' => $response->ok, 'description' => $response->description]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Configura Webhook Telegram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
      body {
        background: linear-gradient(135deg, #1c92d2, #f2fcfe);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .card {
        border-radius: 1.5rem;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
      }
      .form-label {
        font-weight: 600;
      }
      .select2-container--default .select2-selection--multiple {
        border-radius: .5rem;
        padding: .4rem;
        border: 1px solid #ced4da;
      }
    </style>
  </head>
  <body>
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card p-4">
            <h2 class="text-center mb-4">Configura Webhook Telegram</h2>

            <?php if ($envToken === null || $envToken === '') : ?>
              <div class="alert alert-info">
                Nessun <code>examples/.env</code> trovato (o <code>TELEGRAM_BOT_TOKEN</code> è
                vuoto). Copia <code>.env.example</code> in <code>.env</code> per precompilare il
                form, oppure inserisci un token manualmente qui sotto.
              </div>
            <?php endif; ?>

            <form id="webhookForm">
              <!-- Token -->
              <div class="mb-3">
                <label for="token" class="form-label">Token <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="token" name="token" required>
              </div>

              <!-- URL -->
              <div class="mb-3">
                <label for="url" class="form-label">URL (HTTPS) <span class="text-danger">*</span></label>
                <input type="url" class="form-control" id="url" name="url" required>
              </div>

              <!-- Certificate -->
              <div class="mb-3">
                <label for="certificate" class="form-label">Certificate (opzionale)</label>
                <input type="file" class="form-control" id="certificate" name="certificate">
              </div>

              <!-- IP -->
              <div class="mb-3">
                <label for="ip_address" class="form-label">IP Address (opzionale)</label>
                <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="es. 192.168.1.10">
              </div>

              <!-- Max connections -->
              <div class="mb-3">
                <label for="max_connections" class="form-label">Max Connections (1-100)</label>
                <input type="number" class="form-control" id="max_connections" name="max_connections" min="1" max="100" value="40">
              </div>

              <!-- Allowed updates -->
              <div class="mb-3">
                <label for="allowed_updates" class="form-label">Allowed Updates</label>
                <select multiple class="form-select" id="allowed_updates" name="allowed_updates[]">
                  <?php foreach (UpdateType::cases() as $updateType) : ?>
                    <?php if ($updateType === UpdateType::Unknown) continue; ?>
                    <option value="<?= $updateType->value ?>"><?= $updateType->value ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="mt-2">
                  <button type="button" class="btn btn-sm btn-outline-primary" id="selectAll">Seleziona tutto</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" id="deselectAll">Deseleziona tutto</button>
                </div>
              </div>

              <!-- Drop pending updates -->
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="drop_pending_updates" name="drop_pending_updates">
                <label class="form-check-label" for="drop_pending_updates">Drop pending updates</label>
              </div>

              <!-- Secret Token -->
              <div class="mb-3">
                <label for="secret_token" class="form-label">Secret Token</label>
                <input type="text" class="form-control" id="secret_token" name="secret_token" maxlength="256" placeholder="A-Z, a-z, 0-9, _ , -">
              </div>

              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success btn-lg w-100">Imposta</button>
                <button type="button" class="btn btn-danger btn-lg w-100" id="removeWebhook">Rimuovi</button>
              </div>
            </form>

            <div id="result" class="mt-4"></div>
            <div id="webhookInfo" class="mt-2"></div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#allowed_updates').select2({
          placeholder: "Seleziona uno o più tipi di update (vuoto = tutti)",
          allowClear: true,
          width: "100%"
        });

        $('#selectAll').on('click', function() {
          let allOptions = [];
          $('#allowed_updates option').each(function() { allOptions.push($(this).val()); });
          $('#allowed_updates').val(allOptions).trigger('change');
        });

        $('#deselectAll').on('click', function() {
          $('#allowed_updates').val(null).trigger('change');
        });

        function renderAlert(type, description) {
          let icon = (type === 'danger' || type === 'warning') ? 'exclamation-triangle'
            : (type === 'success') ? 'check-circle' : 'info-circle';
          return `
            <div class="alert alert-${type} d-flex align-items-center" role="alert">
              <i class="bi bi-${icon}-fill me-2"></i>
              <div>${description}</div>
            </div>`;
        }

        function renderWebhookInfo(info) {
          if (!info) { $('#webhookInfo').html(''); return; }
          let rows = [
            ['URL attuale', info.url || '(nessuno)'],
            ['Aggiornamenti in attesa', info.pending_update_count ?? 0],
            ['Max connections', info.max_connections ?? '-'],
          ];
          if (info.last_error_message) {
            rows.push(['Ultimo errore', `${info.last_error_message} (${new Date(info.last_error_date * 1000).toLocaleString()})`]);
          }
          let html = '<table class="table table-sm table-borderless mb-0">' +
            rows.map(([label, value]) => `<tr><td class="text-muted">${label}</td><td>${value}</td></tr>`).join('') +
            '</table>';
          $('#webhookInfo').html(html);
        }

        function loadPrefill() {
          fetch('setup.php?ajax=1')
            .then(res => res.json())
            .then(data => {
              if (data.token) $('#token').val(data.token);
              $('#url').val(data.url || '');
              $('#secret_token').val(data.secret_token || '');
              if (data.allowed_updates && data.allowed_updates.length) {
                $('#allowed_updates').val(data.allowed_updates).trigger('change');
              }
              renderWebhookInfo(data.webhook_info);
            });
        }

        loadPrefill();

        $('#webhookForm').on('submit', async function(e) {
          e.preventDefault();

          let formData = new FormData(this);
          let response = await fetch('setup.php', { method: 'POST', body: formData });
          let data = await response.json();

          if (data.ok === false) {
            $('#result').html(renderAlert('danger', data.description || 'Errore sconosciuto'));
          } else {
            $('#result').html(renderAlert('success', data.description || 'Operazione completata'));
            loadPrefill();
          }
        });

        $('#removeWebhook').on('click', async function() {
          if (!confirm('Sei sicuro di voler rimuovere il Webhook?')) return;

          if (!$('#token').val()) {
            $('#result').html(renderAlert('danger', 'Token mancante'));
            return;
          }

          let formData = new FormData($('#webhookForm')[0]);
          formData.set('remove', '1');
          let response = await fetch('setup.php', { method: 'POST', body: formData });
          let data = await response.json();

          if (data.ok === false) {
            $('#result').html(renderAlert('danger', data.description || 'Errore sconosciuto'));
          } else {
            $('#result').html(renderAlert('success', data.description || 'Webhook rimosso'));
            loadPrefill();
          }
        });
      });
    </script>
  </body>
</html>
