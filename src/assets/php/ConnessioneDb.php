<?php
// Dati estratti dalla configurazione Docker/Env
$NomeHost = "db";
$NomeUtente = "cecorrente_user";
$Password = "admin";
$NomeDatabase = "my_cecorrente";

// Connessione con gestione errori conforme ai requisiti
$connessione = new mysqli($NomeHost, $NomeUtente, $Password, $NomeDatabase);

// Verifica connessione
if ($connessione->connect_error) {
   // In produzione, meglio loggare l'errore che mostrarlo a video
   error_log("Errore di connessione: " . $connessione->connect_error);
   die("Spiacenti, si è verificato un errore di connessione al database.");
}

// Opzionale: Setta il charset a utf8 per evitare problemi con i nomi dei comuni
$connessione->set_charset("utf8");
?>