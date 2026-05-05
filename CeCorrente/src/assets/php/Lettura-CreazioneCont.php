<?php

include('ConnessioneDb.php');

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

// --------------------
// INPUT
// --------------------
$azione = $_POST['azione'] ?? '';

$MC          = $_POST['ModCont'] ?? null;
$CCR         = $_POST['CodiceContr'] ?? null;
$CodiceCont  = $_POST['CodC'] ?? null;
$KWM         = $_POST['KWC'] ?? null;

$MatricolaD = $_SESSION['MatricolaD'] ?? null;

// 👉 FIX IMPORTANTE: campo mancante nel DB
$Tipo = 'manuale';


// --------------------
// RISPOSTA
// --------------------
function risposta($msg) {
    echo "
    <html>
    <head>
        <meta http-equiv='refresh' content='2;url=../../HomeDipendenti.php'>
    </head>
    <body style='font-family:Arial;text-align:center;margin-top:100px;'>
        <h2>$msg</h2>
        <p>Reindirizzamento in corso...</p>
    </body>
    </html>
    ";
    exit();
}


// --------------------
// CONTROLLO AZIONE
// --------------------
if ($azione === '') {
    risposta("❌ Nessuna azione selezionata");
}


// --------------------
// INSTALLAZIONE CONTATORE
// --------------------
if ($azione === 'installazione') {

    if (!$MC || !$CCR) {
        risposta("❌ Dati contatore mancanti");
    }

    $stmt = $connessione->prepare(
        "INSERT INTO contatore (Modello, StatoContatore, CodC, Tipo)
         VALUES (?, 1, ?, ?)"
    );

    if (!$stmt) {
        risposta("❌ Errore database");
    }

    $stmt->bind_param('sss', $MC, $CCR, $Tipo);
}


// --------------------
// LETTURA CONTATORE
// --------------------
elseif ($azione === 'lettura') {

    if (!$CodiceCont || !$KWM || !$MatricolaD) {
        risposta("❌ Dati lettura mancanti");
    }

    $KWM_float = (float) $KWM;

    $stmt = $connessione->prepare(
        "INSERT INTO lettura (KWh, MatricolaD, CodCont, Tipo)
         VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        risposta("❌ Errore database");
    }

    $stmt->bind_param('dsss', $KWM_float, $MatricolaD, $CodiceCont, $Tipo);
}


// --------------------
// AZIONE NON VALIDA
// --------------------
else {
    risposta("❌ Azione non valida");
}


// --------------------
// ESECUZIONE
// --------------------
if (!$stmt->execute()) {
    risposta("❌ Errore durante inserimento");
}

$stmt->close();

risposta("✔ Operazione effettuata con successo");

?>