<?php
// 1. Inizia la sessione come PRIMISSIMA cosa
session_start();

include('ConnessioneDb.php'); 

// Acquisizione dati
$matricolaD = $_POST["matricolaD"];
$password = $_POST["password"];

// Query
$sql = "SELECT MatricolaD, LivelloDiAutorizzazione, Tipo FROM dipendenti WHERE MatricolaD='$matricolaD' AND Password='$password'";
$risultato = mysqli_query($connessione, $sql);

if (mysqli_num_rows($risultato) == 0) {
    // Se c'è un errore, non stampare nulla, reindirizza e basta
    header("Location: ../../index.php");
    exit(); // Blocca l'esecuzione
} else {
    $riga = mysqli_fetch_array($risultato);
    
    // Salviamo i dati in sessione
    $_SESSION['MatricolaD'] = $riga['MatricolaD'];
    $_SESSION['LivelloAuto'] = $riga['LivelloDiAutorizzazione'];
    $_SESSION['TipoUser'] = $riga['Tipo']; // Nota: usa 'TipoUser' se sessioni.php cerca questo nome
    
    // Reindirizzamento alla Home
    header("Location: ../../HomeDipendenti.php");
    exit();
}
?>