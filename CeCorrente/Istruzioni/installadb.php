<?php
$host = "127.0.0.1";
$user = "root";
$password = "";

$connessione = mysqli_connect($host, $user, $password);

if (!$connessione) {
    // FIX: Messaggio generico all'utente e log tecnico sul server
    error_log("Fallimento connessione MySQL: " . mysqli_connect_error());
    die("Errore critico di sistema. L'installazione non può proseguire.");
}

$db_name = "my_cecorrente";
$provaDb = mysqli_select_db($connessione, $db_name);

if (!$provaDb) {
    $query = 'CREATE DATABASE ' . $db_name;
    $risultato = mysqli_query($connessione, $query);

    if (!$risultato) {
        // FIX: Nessuna stampa della query fallita a video
        error_log("Impossibile creare il database: " . mysqli_error($connessione));
        die("Si è verificato un errore durante la configurazione iniziale.");
    } else {
        mysqli_select_db($connessione, $db_name);
    }
}

$templine = '';
if (file_exists('cecorrente.sql')) {
    $lines = file('cecorrente.sql');
    foreach ($lines as $line) {
        if (substr($line, 0, 2) == '--' || $line == '') {
            continue;
        }

        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';') {
            // FIX: Esecuzione silenziosa della query
            $exec_query = mysqli_query($connessione, $templine);

            if (!$exec_query) {
                // L'errore viene loggato internamente per il debugging
                error_log("Errore importazione query: " . mysqli_error($connessione));
                die("Errore durante l'importazione dei dati. Consultare i log di sistema.");
            }
            $templine = '';
        }
    }
    echo "Configurazione completata correttamente.";
} else {
    die("Risorsa di installazione non trovata.");
}
?>