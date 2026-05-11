<?php
include('ConnessioneDb.php');

$CodiceCliente = $_GET['CodiceC'] ?? '';
$DataOff = $_GET['DataOfferta'] ?? '';
$DiF = $_GET['DataInizioFornitura'] ?? '';
$KWM = $_GET['KWMax'] ?? '';
$IndirizzoF = $_GET['IndirizzoFornitura'] ?? '';
$Cap = $_GET['CAP'] ?? '';

$sql = "SELECT CodComune FROM comuni WHERE CAP = ? LIMIT 1";
$stmt = mysqli_prepare($connessione, $sql);
mysqli_stmt_bind_param($stmt, "s", $Cap);
mysqli_stmt_execute($stmt);
$risultato = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($risultato)) {
    $CodComune = $row['CodComune'];
} else {
    die("Errore: CAP non valido.");
}

$sql = "INSERT INTO contratto (DataStipula, DataInizioFornitur, KWMax, IndirizzoFornitura, CodComune, CodCliente) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connessione, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $DataOff, $DiF, $KWM, $IndirizzoF, $CodComune, $CodiceCliente);

$risultato = mysqli_stmt_execute($stmt);

if (!$risultato) {

    error_log("Errore Query: " . mysqli_stmt_error($stmt));
    echo "<br>Si è verificato un errore durante l'inserimento dei dati. Riprovare più tardi.";
    exit();
} else {
    echo "Contratto registrato con successo<br>";

    $referer = $_SERVER['HTTP_REFERER'] ?? 'index.php';
    $safe_referer = htmlspecialchars($referer, ENT_QUOTES, 'UTF-8');

    echo '<a href="' . $safe_referer . '">clicca qui per tornare indietro</a>';
}
?>