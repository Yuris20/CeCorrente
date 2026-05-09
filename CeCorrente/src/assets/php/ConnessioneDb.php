<?php
$NomeHost     = getenv('DB_HOST');
$NomeUtente   = getenv('DB_USER');
$Password     = getenv('DB_PASSWORD');
$NomeDatabase = getenv('DB_NAME');

if (!$NomeHost || !$NomeUtente || !$Password || !$NomeDatabase) {
    error_log('Variabili ambiente DB mancanti');
    die('Errore configurazione server.');
}

$connessione = new mysqli($NomeHost, $NomeUtente, $Password, $NomeDatabase);

if ($connessione->connect_error) {
    error_log('Errore connessione DB: ' . $connessione->connect_error);
    die('Errore di connessione.');
}

$connessione->set_charset('utf8mb4');

GITHUB_TOKEN="ghp_FAKEFAKEFAKEFAKEFAKEFAKEFAKE1234"

?>


