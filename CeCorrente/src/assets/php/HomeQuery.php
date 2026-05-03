<?php
// HomeQuery.php - Versione corretta mantenendo i tuoi nomi originali

// 1. Conteggio Clienti
$sql = "SELECT COUNT(CodCliente) as tot FROM cliente"; // Rimosse le virgolette storte che possono dare fastidio
$risultato = mysqli_query($connessione, $sql);
if ($risultato && mysqli_num_rows($risultato) > 0) {
    $riga = mysqli_fetch_array($risultato);
    $Clienti = $riga['tot'];
} else {
    $Clienti = 0;
}

// 2. Dati Contratto
$sql = "SELECT DataStipula, DataInizioFornitur FROM contratto WHERE CodCliente = '$CodiceCliente'";
$risultato = mysqli_query($connessione, $sql);
if ($risultato && mysqli_num_rows($risultato) > 0) {
    $riga = mysqli_fetch_array($risultato);
    $DataStipula = $riga['DataStipula'];
    $DataInizioFornitura = $riga['DataInizioFornitur'];
} else {
    $DataStipula = "N.D.";
    $DataInizioFornitura = "N.D.";
}

// 3. Ultima Lettura
$sql = "SELECT KWh FROM lettura 
        LEFT JOIN contatore ON lettura.CodCont = contatore.CodCont 
        LEFT JOIN contratto ON contatore.codc = contratto.codc 
        WHERE contratto.CodCliente = '$CodiceCliente' 
        ORDER BY DataLettura DESC LIMIT 1";
$risultato = mysqli_query($connessione, $sql);
if ($risultato && mysqli_num_rows($risultato) > 0) {
    $riga = mysqli_fetch_array($risultato);
    $Lettura = $riga['KWh'];
} else {
    $Lettura = 0;
}

// 4. Codice Contatore e Data Installazione (Unite in una sola query per velocità)
$sql = "SELECT contatore.CodCont, contatore.DataInstallazione 
        FROM contatore 
        LEFT JOIN contratto ON contatore.codc = contratto.codc 
        WHERE contratto.CodCliente = '$CodiceCliente' 
        ORDER BY contatore.CodCont DESC LIMIT 1";
$risultato = mysqli_query($connessione, $sql);
if ($risultato && mysqli_num_rows($risultato) > 0) {
    $riga = mysqli_fetch_array($risultato);
    $CodCont = $riga['CodCont'];
    $DataInstallazione = $riga['DataInstallazione'];
} else {
    $CodCont = "N.D.";
    $DataInstallazione = "N.D.";
}
?>