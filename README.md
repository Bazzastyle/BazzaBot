# bazzastyle/bazzabot

Framework PHP OOP puro per costruire bot Telegram con le [Bot API](https://core.telegram.org/bots/api).
Nessuna dipendenza runtime a parte le estensioni PHP native (`curl`, `json`, `mbstring`, `PDO`) e
`psr/log` (sole interfacce). Concorrenza tramite `curl_multi` nativo, nessun event loop esterno.

## Caratteristiche

- **Copertura completa API Telegram**: tutti i 185 metodi delle Bot API (v10.3.0) generati come
  metodi PHP tipizzati (parametri obbligatori/opzionali fedeli alla spec ufficiale), rigenerabili
  in un comando quando Telegram rilascia una nuova versione (vedi `tools/generate-api.php`).
  `call(string $method, array $params)` resta disponibile per i metodi aggiunti da Telegram prima
  dell'ultima rigenerazione.
- **Types Telegram come oggetti PHP**: tutti gli oggetti delle Bot API (`InlineKeyboardMarkup`,
  `ReplyParameters`, `ChatPermissions`, ...) sono classi generate in `src/Types/`, utilizzabili
  direttamente come argomenti dei metodi tipizzati al posto di array associativi grezzi (vedi
  `tools/generate-types.php`).
- **Database**: wrapper PDO per mysql/pgsql/sqlite con rilevamento del driver a runtime
  (fallisce con un errore chiaro se l'estensione non è installata, invece di un errore PDO criptico).
- **Rate limiting**: token bucket conforme ai [limiti Telegram](https://core.telegram.org/bots/faq#my-bot-is-hitting-limits-how-do-i-avoid-this)
  (30 msg/sec globali, 1 msg/sec per chat, 20 msg/min per gruppo), con gestione automatica dei 429.
- **Concorrenza**: `CurlMultiPool` per operazioni bulk (broadcast a molte chat) senza dipendenze esterne.
- **Routing**: comandi (con prefisso configurabile: `/`, `.`, `#`, ...), callback_data (esatto o
  pattern), un handler per tipo di update (poll, my_chat_member, inline_query, ...), fallback
  testuale, pipeline di middleware.
- **Webhook e long-polling**: stesso Router/handler applicativo, cambia solo l'entrypoint.
- **Sicurezza**: `hash_equals()` per il secret token webhook, allowlist IP opzionale, prepared
  statement ovunque, segreti solo da `.env`.
- **Logging**: compatibile PSR-3, handler su file e su chat Telegram (per gli errori critici).

## Installazione

```bash
composer require bazzastyle/bazzabot
```

Oppure, per svilupparlo/estenderlo localmente, come repository path (come già fatto per gli
altri pacchetti `bazzastyle/*` in questo progetto):

```json
{
    "repositories": [
        {"type": "path", "url": "../bazzabot"}
    ],
    "require": {
        "bazzastyle/bazzabot": "*"
    }
}
```

## Guida rapida

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Bazzastyle\BazzaBot\Bot;
use Bazzastyle\BazzaBot\Routing\Context;

$bot = Bot::fromEnvFile(__DIR__ . '/.env');

$bot->router->command('start', function (Context $context): void {
    $context->client->sendMessage($context->update->getChatId(), 'Ciao! Sono vivo.');
});

// Webhook: $bot->handleWebhook(secretHeader: ..., sourceIp: ...);
// Long polling: $bot->runPolling();
```

Vedi `examples/` per un bot completo (bootstrap, entrypoint webhook e polling) e `.env.example`
per tutte le variabili di configurazione supportate.

### Comandi e prefissi personalizzati

Di default il `Router` riconosce i comandi con `/` (la convenzione Telegram standard), ma il
prefisso è configurabile tramite `COMMAND_PREFIXES` nel `.env` (lista separata da virgola: es.
`COMMAND_PREFIXES=/,.,#`). Con più prefissi configurati, `/ban`, `.ban` e `#ban` attivano tutti
lo stesso handler — registralo una sola volta, senza il simbolo:

```php
$bot->router->command('ban', function (Context $context, string $args): void {
    // $args è il testo grezzo dopo il nome del comando, per intero:
    //   "/ban @mario spam nel gruppo"  -> $args = "@mario spam nel gruppo"
    //   ".ban @mario"                  -> $args = "@mario"
    //   "#ban testo libero"            -> $args = "testo libero"
    //   "/ban" (senza argomenti)       -> $args = ""
    // Separare un username da un motivo (o qualsiasi altro token) tocca all'handler:
    [$target, $reason] = array_pad(explode(' ', $args, 2), 2, null);
});
```

Se assembli il `Router` a mano invece di usare `Bot::fromEnvFile()`, passa i prefissi al
costruttore: `new Router(['/', '.', '#'])` (default `['/']` se omesso).

> Nota sul file `.env`: se un prefisso è `#` e nel valore ci sono spazi prima di esso (es.
> `COMMAND_PREFIXES=/, ., #`), il parser lo interpreta come inizio di un commento e tronca il
> valore. Scrivi il valore senza spazi (`COMMAND_PREFIXES=/,.,#`) oppure racchiudilo tra doppi
> apici (`COMMAND_PREFIXES="/, ., #"`).

### Comandi riservati agli amministratori

`ADMINS` nel `.env` è una lista di ID utente Telegram (numerici, separati da virgola) considerati
amministratori del bot: `Bot::fromEnvFile()` la espone come `$bot->admins`
(`Bazzastyle\BazzaBot\Auth\AdminList`), pronta per un controllo in qualunque handler:

```
ADMINS=111111111,222222222
```

```php
$bot->router->command('ban', function (Context $context, string $args) use ($bot): void {
    if (!$bot->admins->isAdmin($context->update->getFromId())) {
        $context->client->sendMessage($context->update->getChatId(), 'Comando riservato agli amministratori.');

        return;
    }

    // ...
});
```

`isAdmin()` accetta anche `null` (es. per tipi di update senza un `from`, dove
`getFromId()` restituisce `null`) e ritorna semplicemente `false`, senza bisogno di un
controllo separato. `AdminList` è indipendente da `Bot`: puoi costruirla a mano
(`new AdminList([111111111, 222222222])`) o da una `Config` qualsiasi
(`AdminList::fromConfig($config)`), anche fuori da `Bot::fromEnvFile()`.

> `$bot` non viene catturato automaticamente in una closure (vedi il gotcha descritto più sotto):
> serve `use ($bot)` esplicito per usare `$bot->admins` dentro un handler, come nell'esempio sopra
> e in `examples/updates/message.php` (comando `/ban`).

### Un file per ogni tipo di update

Comandi e callback_data coprono i casi più comuni, ma un bot spesso deve reagire anche ad altri
tipi di update (poll, my_chat_member, chat_join_request, inline_query, ...). `Router::onUpdateType()`
registra un handler per uno specifico tipo (enum `Bazzastyle\BazzaBot\Update\UpdateType`):

```php
use Bazzastyle\BazzaBot\Update\UpdateType;

$bot->router->onUpdateType(UpdateType::Poll, function (Context $context): void {
    $poll = $context->update->raw->poll; // niente accessori dedicati: stdClass grezzo di Telegram
    // ...
});
```

`examples/updates/` contiene un file per ciascun tipo non gestito da comando/callback (uno per
file come in `vendor/bazzastyle/bazzabot/example/update/`, ma qui ogni file si registra da solo
su `$bot->router` invece di essere incluso condizionalmente da un dispatcher centrale):

| File | Tipi di update |
|---|---|
| `message.php` | `message` (solo se non è un comando riconosciuto — vedi nota sotto) |
| `callback.php` | `callback_query` (solo se `callback_data` non ha trovato una `callback()`/`callbackPattern()` registrata — vedi nota sotto) |
| `my_chat_member.php` | `my_chat_member` (il bot viene aggiunto/rimosso/promosso) |
| `chat_member.php` | `chat_member` (un altro utente entra/esce/cambia stato) |
| `request.php` | `chat_join_request` |
| `boost.php` | `chat_boost`, `removed_chat_boost` |
| `poll.php` | `poll`, `poll_answer` |
| `inline.php` | `inline_query`, `chosen_inline_result` |
| `shipping.php` | `shipping_query` |
| `checkout.php` | `pre_checkout_query` |
| `purchased.php` | `purchased_paid_media` |
| `reaction.php` | `message_reaction`, `message_reaction_count` |
| `channel.php` | `channel_post`, `edited_channel_post` |
| `business.php` | `business_connection`, `business_message`, `edited_business_message`, `deleted_business_messages` |
| `managed_bot.php` | `managed_bot` |
| `subscription.php` | `subscription` |

`examples/bootstrap.php` li carica tutti automaticamente (`glob(__DIR__ . '/updates/*.php')`):
per gestire un nuovo tipo aggiungi semplicemente un file lì, senza toccare `bootstrap.php`.

`message.php` e `callback.php` sono gli unici due che si affiancano a un meccanismo più
specifico già esistente, invece di essere l'unico gestore del tipo, e sono anche il posto dove
vivono le registrazioni stesse:

- **`examples/updates/message.php`**: qui ci sono sia i comandi (`/start`, `/ping`, `/menu`,
  `/ban`, registrati con `command()`) sia il fallback per i messaggi che non sono un comando
  riconosciuto (`onUpdateType(UpdateType::Message, ...)`).
- **`examples/updates/callback.php`**: qui c'è sia il callback specifico del menu
  (`callbackPattern('menu:*', ...)`) sia il fallback per `callback_data` non riconosciuti
  (`onUpdateType(UpdateType::CallbackQuery, ...)`).

Il `Router` prova sempre prima `command()` (per i messaggi) e `callback()`/`callbackPattern()`
(per i callback_query), e solo se **nessuno** di questi matcha arriva al rispettivo
`onUpdateType()` nello stesso file — esattamente come nel dispatcher a `isset()` di riferimento,
dove `update/callback.php` viene incluso solo quando l'update è un `callback_query` (qui, in
più, solo se non già gestito da una `callback()`/`callbackPattern()` più specifica registrata
prima nello stesso file). Per aggiungere un nuovo comando o un nuovo callback, modifica
direttamente `message.php`/`callback.php` (o aggiungi un altro `command()`/`callbackPattern()`
in un file a parte: vengono comunque caricati tutti da `bootstrap.php`). Ordine di prova
completo: comandi → callback esatti/pattern → `onUpdateType()` (qualunque tipo, incluso
`message`/`callback_query`) → `onText()` → `fallback()`.

> Attenzione se scrivi closure che usano `$bot` (es. `$bot->logger`) dentro un file caricato da
> `bootstrap.php`: PHP non cattura automaticamente le variabili esterne in una closure. Usa
> `$context->logger`/`$context->client` (sempre disponibili sull'oggetto `Context` passato come
> parametro) invece di `$bot->...`, oppure dichiara esplicitamente `use ($bot)`.

> `guest_message` (tipo `UpdateType::GuestMessage`) non ha un file dedicato: ha la stessa forma
> di `message` (stesso oggetto `Message`), quindi `Update` lo tratta allo stesso modo —
> `getText()`/`getChatId()`/`getCommand()`/ecc. funzionano identici, e i comandi già registrati
> con `command()` continuano a funzionare. Rispondi con `answerGuestQuery()` invece di
> `sendMessage()` (vedi la [documentazione ufficiale](https://core.telegram.org/bots/api#update)).

### Pagina web di setup del webhook

`examples/setup.php` è una pagina web (Bootstrap + select2, nessuna dipendenza server-side
extra) per impostare/rimuovere il webhook del bot configurato in `examples/.env` (stesso file
usato da `bootstrap.php`) — **un bot alla volta**, non è pensata per gestire più token dallo
stesso codice sorgente:

1. Copia `examples/.env.example` in `examples/.env` (se non l'hai già fatto per `bootstrap.php`).
2. Apri `setup.php` nel browser: precompila token/URL/secret da `examples/.env` e mostra lo
   stato attuale del webhook (URL registrato, aggiornamenti in coda, ultimo errore). Il token
   può comunque essere sovrascritto a mano nel form (es. per una prova al volo).
3. Imposta URL, certificato (opzionale, per self-signed), IP, max connections, i tipi di update
   da ricevere e un secret token, poi premi "Imposta" (o "Rimuovi" per cancellare il webhook).

La pagina usa `TelegramClient::setWebhook()`/`deleteWebhook()`/`getWebhookInfo()` (le stesse
classi del framework, non un client HTTP separato).

Per configurare **più bot** che condividono lo stesso `webhook.php` (vedi la sezione successiva
"Più bot, stesso codice"), usa questa pagina una volta per ciascun token, impostando come URL
`.../webhook.php?api=<token del bot>` — la pagina in sé resta a singolo bot, cambia solo l'URL
che scrivi nel campo "URL".

> Sicurezza: chiunque acceda a questa pagina può cambiare il webhook del bot configurato in
> `examples/.env`. Non esporla pubblicamente senza protezione — imposta la variabile d'ambiente
> `SETUP_ACCESS_TOKEN` per richiedere `?access_token=...` a ogni richiesta, oppure limita
> l'accesso via webserver/IP, oppure cancella il file dopo l'uso.

### Più bot, stesso codice (un solo webhook.php condiviso)

Il framework supporta il caso di **un solo `webhook.php` deployato una volta sola**, che serve N
bot distinti, distinguendoli in base al token passato nell'URL del webhook — lo stesso approccio
già usato in questo progetto da altri bot (es. `ProjectOneXBot/index.php`, che legge `$_GET['api']`).

Come funziona:

1. Un solo `.env` condiviso contiene la configurazione comune a tutti i bot (secret token,
   database, rate limit, prefissi comandi, ...) e **lascia `TELEGRAM_BOT_TOKEN` vuoto**.
2. Per ogni bot, imposti il webhook su Telegram puntando allo stesso file, con il token di
   quel bot in query string: `https://tuohost/webhook.php?api=<token-del-bot>` (puoi farlo con
   `examples/setup.php`: scrivi questo URL nel campo "URL").
3. `Bot::fromEnvFile()` accetta un secondo parametro opzionale, il token da usare al posto di
   quello nel `.env`; `examples/bootstrap.php` lo passa già in automatico da `$_GET['api']`:

```php
// examples/bootstrap.php
$bot = Bot::fromEnvFile(__DIR__ . '/.env', $_GET['api'] ?? null);
```

Quando Telegram chiama `webhook.php?api=<token-del-bot>`, quel token viene usato per costruire
il `TelegramClient` di quella singola richiesta (quindi le risposte del bot arrivano dal bot
giusto), mentre secret token, database, rate limit e logging restano quelli del `.env`
condiviso. In modalità polling (`poll.php`, CLI) `$_GET` è sempre vuoto: il token torna a essere
quello del `.env`, senza bisogno di alcuna modifica.

> Sicurezza: il secret token del webhook (`TELEGRAM_WEBHOOK_SECRET`, verificato con
> `hash_equals()` indipendentemente da `?api=`) resta l'unica vera barriera di accesso — deve
> essere lo stesso per tutti i bot che condividono il `.env`, impostato allo stesso modo quando
> configuri ciascun webhook. Il valore di `?api=` non viene validato contro nulla: serve solo a
> scegliere quale token usare per rispondere, non a autorizzare la richiesta.

### Coprire l'intera API Telegram

Ogni metodo delle Bot API è disponibile come metodo PHP tipizzato, con i parametri obbligatori
come argomenti posizionali e quelli opzionali come argomenti nominati (named arguments):

```php
$bot->client->sendMessage($chatId, 'Ciao', parse_mode: 'HTML');

$bot->client->promoteChatMember(
    chat_id: $chatId,
    user_id: $userId,
    can_delete_messages: true,
);
```

Per un metodo aggiunto da Telegram dopo l'ultima rigenerazione (quindi non ancora presente in
`src/Http/GeneratedMethods.php`), usa `call()` con un array esplicito:

```php
$bot->client->call('someBrandNewMethod', ['chat_id' => $chatId]);
```

> `__call()` magico non supporta i named argument di PHP (che non vengono inoltrati con le
> chiavi), quindi per i metodi non ancora generati usa sempre `call()` con un array esplicito.

### Usare i Types come oggetti invece di array

Ogni oggetto delle Bot API (`InlineKeyboardMarkup`, `InlineKeyboardButton`, `ReplyParameters`,
`ChatPermissions`, `InputMediaPhoto`, ...) è una classe in `Bazzastyle\BazzaBot\Types\`: readonly,
con i campi obbligatori come parametri posizionali e quelli opzionali come argomenti nominati,
e implementa `\JsonSerializable`. I metodi tipizzati generati li accettano direttamente al posto
dell'array grezzo:

```php
use Bazzastyle\BazzaBot\Types\InlineKeyboardButton;
use Bazzastyle\BazzaBot\Types\InlineKeyboardMarkup;

$markup = new InlineKeyboardMarkup(inline_keyboard: [
    [
        new InlineKeyboardButton(text: 'Menu', callback_data: 'menu:main'),
        new InlineKeyboardButton(text: 'Sito', url: 'https://example.com'),
    ],
]);

$bot->client->sendMessage($chatId, 'Scegli:', reply_markup: $markup);
```

Un array associativo grezzo resta comunque sempre accettato come alternativa (utile per campi
non ancora modellati o per chi preferisce costruirlo a mano): ogni parametro tipizzato contro un
Type accetta anche `array`. Gli oggetti annidati (es. i bottoni dentro la tastiera) vengono
serializzati ricorsivamente in automatico da `json_encode()`.

I tipi "astratti" della spec Telegram (es. `InputMedia`, `ChatMember`, `BotCommandScope`, che
nella documentazione ufficiale sono "deve essere uno tra...") diventano interfacce PHP marker
(`interface InputMedia extends \JsonSerializable {}`), implementate dalle rispettive classi
concrete (`InputMediaPhoto`, `InputMediaVideo`, ...), così un parametro tipizzato `InputMedia|array`
accetta qualunque variante concreta.

`Bazzastyle\BazzaBot\Http\InputFile` (upload di file locali) resta una classe a parte, non
generata: rappresenta un concetto diverso (un file sul filesystem locale), non un oggetto
dati della Bot API.

#### Aggiornare metodi e types quando esce una nuova versione delle Bot API

`src/Http/GeneratedMethods.php` e ogni classe/interfaccia in `src/Types/` sono generati
automaticamente da `tools/generate-methods.php` e `tools/generate-types.php` a partire dalla spec
machine-readable mantenuta dalla community su
[davtur19/TuriBotGen](https://github.com/davtur19/TuriBotGen) (la stessa fonte usata da
`bazzastyle/bazzabot`), tenuta allineata a ogni release ufficiale delle Bot API. Per rigenerare
tutto dopo un aggiornamento Telegram:

```bash
php tools/generate-api.php   # equivale a: generate-types.php + generate-methods.php
composer dump-autoload       # solo se sono stati aggiunti nuovi Types (nuove classi)
composer test
```

I comandi riscrivono interamente i file generati (in `src/Types/` vengono cancellati solo i file
che hanno l'header "AUTO-GENERATED", per non toccare eventuali file aggiunti a mano per errore):
rivedi il diff (`git diff` se il pacchetto è versionato) prima di committare. Non modificare mai
a mano i file generati — le modifiche andrebbero perse alla rigenerazione successiva.

### Broadcast concorrente

```php
foreach ($bot->client->broadcast('sendMessage', $chatIds, ['text' => 'Novità!']) as $chatId => $response) {
    if (!$response->ok) {
        $bot->logger->warning('Invio fallito', ['chat_id' => $chatId, 'description' => $response->description]);
    }
}
```

Il rate limiter è applicato automaticamente sia alle chiamate singole che a quelle concorrenti.

### Database

```php
if ($bot->database !== null) {
    $bot->database->execute(
        'INSERT INTO users (telegram_id, name) VALUES (:id, :name)',
        [['id', $context->update->getFromId(), 'int'], ['name', 'Mario', 'str']],
    );
}
```

Se `DB_DRIVER` richiede un'estensione PDO non installata, viene lanciata una `ConfigException`
con il nome esatto dell'estensione da abilitare (es. `ext-pdo_sqlite`), invece di un errore PDO
criptico.

Esempio completo — creazione tabella se non esiste, insert e select — nel comando `/note` di
`examples/updates/message.php`: usa `$db->pdo()->getAttribute(PDO::ATTR_DRIVER_NAME)` per
scegliere a runtime la sintassi della chiave auto-incrementante corretta (sqlite/pgsql/mysql
differiscono), poi `execute()` per `CREATE TABLE IF NOT EXISTS`/`INSERT` e `query()` per il
`SELECT`, sempre con parametri legati come tuple `[nome, valore, tipo]` (mai concatenazione di
stringhe nell'SQL).

## Test

```bash
composer install
composer test
```

I test che richiedono un driver PDO non disponibile vengono saltati automaticamente
(`markTestSkipped`); il test "driver non disponibile" viene invece saltato quando il driver è
presente (verifica il path opposto).

## Note di design

- Nessun `exit()`/chiamata di rete dentro il layer database: gli errori risalgono sempre come
  `DatabaseException`.
- L'allowlist IP del webhook è opzionale e disattivata di default: l'IP sorgente va passato
  esplicitamente da chi integra il framework, mai letto automaticamente da header spoofabili.
- Il logger verso Telegram (`TelegramLogHandler`) usa un client dedicato collegato solo al logger
  su file, per evitare che un'interruzione prolungata di Telegram inneschi un loop di notifiche
  fallite che si rilogano a vicenda.