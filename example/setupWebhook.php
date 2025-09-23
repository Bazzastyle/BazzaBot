<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' || isset( $_GET[ 'ajax' ] ) ) {
  header( 'Content-Type: application/json' );

  $envFile = __DIR__ . '/env.php';
  if ( file_exists( $envFile ) ) require $envFile;
  else $env = [];

  $token = $_POST[ 'token' ] ?? ( $env[ 'botToken' ] ?? '' );
  if ( empty( $token ) ) {
    echo json_encode( [ 'ok' => false, 'description' => '⚠️ Nessun token fornito' ] );
    exit;
  }

  $apiUrl = ( $env[ 'endpoint' ] ?? 'https://api.telegram.org/bot' ) . $token . '/setWebhook';

  $params = [ 'url' => $env[ 'webhook' ] ?? '' ];
  if ( ! empty( $env[ 'botApiSecretToken' ] ) ) $params[ 'secret_token' ] = $env[ 'botApiSecretToken' ];
  if ( ! empty( $env[ 'getUpdates' ][ 'allowedUpdates' ] ) ) $params[ 'allowed_updates' ] = json_encode( $env[ 'getUpdates' ][ 'allowedUpdates' ] );
  if ( ! empty( $env[ 'getUpdates' ][ 'limit' ] ) ) $params[ 'max_connections' ] = ( int ) $env[ 'getUpdates' ][ 'limit' ];

  if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $params[ 'url' ] = $_POST[ 'url' ] ?? $params[ 'url' ];
    if ( ! empty( $_POST[ 'ip_address' ] ) ) $params[ 'ip_address' ] = $_POST[ 'ip_address' ];
    if ( ! empty( $_POST[ 'max_connections' ] ) ) $params[ 'max_connections' ] = ( int ) $_POST[ 'max_connections' ];
    if ( ! empty( $_POST[ 'allowed_updates' ] ) ) $params[ 'allowed_updates' ] = json_encode( $_POST[ 'allowed_updates' ] );
    if ( ! empty( $_POST[ 'secret_token' ] ) ) $params[ 'secret_token' ] = $_POST[ 'secret_token' ];
    if ( isset( $_POST[ 'drop_pending_updates' ] ) ) $params[ 'drop_pending_updates' ] = true;
    if ( ! empty( $_FILES[ 'certificate' ][ 'tmp_name' ] ) ) $params[ 'certificate' ] = new CURLFile( $_FILES[ 'certificate' ][ 'tmp_name' ] );

    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $apiUrl );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
    $response = curl_exec( $ch );
    curl_close( $ch );

    echo $response;
    exit;
  }

  echo json_encode( [
    'token'           => $token,
    'url'             => $params[ 'url' ],
    'secret_token'    => $params[ 'secret_token' ] ?? '',
    'allowed_updates' => isset( $params[ 'allowed_updates' ] ) ? json_decode( $params[ 'allowed_updates' ], true ) : [],
    'max_connections' => $params[ 'max_connections' ] ?? 40
  ] );
  exit;
}

require_once '../vendor/bazzastyle/bazzabot/src/EasyVars.php';
?>

<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Configura Telegram Webhook</title>
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card p-4">
            <h2 class="text-center mb-4">Configura Webhook Telegram</h2>
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
                <label for="allowed_updates" class="form-label">Allowed Updates <span class="text-danger">*</span></label>
                <select multiple class="form-select" id="allowed_updates" name="allowed_updates[]" required>
                  <?php foreach ( BazzaBot\EasyVars::getUpdateTypes() as $update ) : ?>
                    <option value="<?= $update ?>"><?= $update ?></option>
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
            <div id="info"></div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#allowed_updates').select2({
          placeholder: "Seleziona uno o più tipi di update",
          allowClear: true,
          width: "100%"
        });

        $('#selectAll').on('click', function() {
          let allOptions = [];
          $('#allowed_updates option').each(function() {
            allOptions.push($(this).val());
          });
          $('#allowed_updates').val(allOptions).trigger('change');
        });

        $('#deselectAll').on('click', function() {
          $('#allowed_updates').val(null).trigger('change');
        });

        fetch("setupWebhook.php?ajax=1")
          .then(res => res.json())
          .then(data => {
            if (data.token) $("#token").val(data.token);
            if (data.url) $("#url").val(data.url);
            if (data.secret_token) $("#secret_token").val(data.secret_token);
            if (data.max_connections) $("#max_connections").val(data.max_connections);
            if (data.allowed_updates) {
              $('#allowed_updates').val(data.allowed_updates).trigger('change');
            }
          });

        function renderAlert(type, description) {
          let icon = '';
          if (type === 'danger' || type === 'warning') { icon = 'exclamation-triangle'; }
          else if (type === 'success') { icon = 'check-circle'; }
          else if (type === 'primary') { icon = 'info-circle'; }
          return `
            <div class="alert alert-${type} d-flex align-items-center" role="alert">
              <i class="bi bi-${icon}-fill me-2"></i>
              <div>${description}</div>
            </div>`;
        }

        $('#webhookForm').on('submit', async function(e) {
          e.preventDefault();

          let formData = new FormData(this);
          let response = await fetch("setupWebhook.php", {
            method: "POST",
            body: formData
          });

          let data = await response.json();

          if (data.ok === false) {
            $("#result").html(renderAlert("danger", data.description));
          } else if (data.ok === true && data.description) {
            if (data.description.includes("already")) {
              $("#result").html(renderAlert("warning", data.description));
            } else if (data.description.includes("was")) {
              $("#result").html(renderAlert("success", data.description));
              $("#info").html(renderAlert("primary", "Per ragioni di sicurezza, cancella questo file di configurazione."));
              alert("⚠️ Per ragioni di sicurezza, cancella questo file di configurazione.");
            } else {
              $("#result").html(renderAlert("success", data.description));
            }
          }
        });

        $('#removeWebhook').on('click', async function() {
          if (!confirm("Sei sicuro di voler rimuovere il Webhook?")) return;

          let token = $("#token").val();
          if (!token) {
            $("#result").html(renderAlert("danger", "Token mancante"));
            return;
          }

          let response = await fetch(`https://api.telegram.org/bot${token}/deleteWebhook`);
          let data = await response.json();

          if (data.ok === false) {
            $("#result").html(renderAlert("danger", data.description));
          } else if (data.ok === true && data.description) {
            if (data.description.includes("already")) {
              $("#result").html(renderAlert("warning", data.description));
            } else if (data.description.includes("was")) {
              $("#result").html(renderAlert("success", data.description));
              $("#info").html(renderAlert("primary", "Per ragioni di sicurezza, cancella questo file di configurazione."));
              alert("⚠️ Per ragioni di sicurezza, cancella questo file di configurazione.");
            } else {
              $("#result").html(renderAlert("success", data.description));
            }
          }
        });
      });
    </script>
  </body>
</html>
