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
    die("CAP non valido");
}


$sql = "
INSERT INTO contratto
(DataStipula, DataInizioFornitur, KWMax, IndirizzoFornitura, CodComune, CodCliente)
VALUES (?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($connessione, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssss",
    $DataOff,
    $DiF,
    $KWM,
    $IndirizzoF,
    $CodComune,
    $CodiceCliente
);

$risultato = mysqli_stmt_execute($stmt);

if (!$risultato) {
    echo "<br>errore nella query dati non inseriti";
    echo mysqli_stmt_error($stmt);
    exit();
} else {
    echo "Contratto registrato con successo<br>";
    echo '<a href="' . ($_SERVER['HTTP_REFERER'] ?? 'index.php') . '">clicca qui per tornare indietro</a>';
}
?>