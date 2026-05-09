<?php
include('ConnessioneDb.php');

$IndirizzoFiscale = $_POST['IndirizzoFiscale'] ?? '';
$cap = $_POST['cap'] ?? '';
$emailPec = $_POST['email'] ?? '';
$NumeroDiTel = $_POST['NumeroDiTel'] ?? '';
$password = $_POST['password'] ?? '';

$Nome = $_POST['Nome'] ?? '';
$Cognome = $_POST['Cognome'] ?? '';

$RagioneSociale = $_POST['RagioneSociale'] ?? '';
$NomeReferente = $_POST['NomeReferente'] ?? '';
$CognomeRef = $_POST['CognomeRef'] ?? '';

$sql = "SELECT CodComune FROM comuni WHERE CAP = ? LIMIT 1";

$stmt = mysqli_prepare($connessione, $sql);
mysqli_stmt_bind_param($stmt, "s", $cap);
mysqli_stmt_execute($stmt);

$risultato = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($risultato)) {
    $CodComune = $row['CodComune'];
} else {
    die("CAP non valido");
}

if ($Nome == "") {

    $tipo = 'Azienda';

    $sql = "
        INSERT INTO cliente
        (IndirizzoFiscale, Telefono, NomeReferente, RagioneSociale, CognomeReferente, EmailPec, Tipo, Password, CodComune)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ";

    $stmt = mysqli_prepare($connessione, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssss",
        $IndirizzoFiscale,
        $NumeroDiTel,
        $NomeReferente,
        $RagioneSociale,
        $CognomeRef,
        $emailPec,
        $tipo,
        $password,
        $CodComune
    );

}

if ($RagioneSociale == "") {

    $tipo = "Privato";

    $sql = "
        INSERT INTO cliente
        (IndirizzoFiscale, Telefono, Cognome, EmailPec, Tipo, Nome, Password, CodComune)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ";

    $stmt = mysqli_prepare($connessione, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssss",
        $IndirizzoFiscale,
        $NumeroDiTel,
        $Cognome,
        $emailPec,
        $tipo,
        $Nome,
        $password,
        $CodComune
    );

}

$risultato = mysqli_stmt_execute($stmt);

if (!$risultato) {
    die("Errore inserimento: " . mysqli_stmt_error($stmt));
}

$sql = "SELECT CodCliente FROM cliente WHERE EmailPec = ? LIMIT 1";

$stmt = mysqli_prepare($connessione, $sql);
mysqli_stmt_bind_param($stmt, "s", $emailPec);
mysqli_stmt_execute($stmt);

$risultato = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($risultato);

$CodCliente = $row['CodCliente'] ?? null;

echo "Cliente aggiunto con successo<br>";
echo "Codice Cliente: " . $CodCliente;

echo '<br><a href="../../index.php">Clicca qui per tornare indietro</a>';
?>