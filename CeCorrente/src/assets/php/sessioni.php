<?php
/* 
 * 1. CONTROLLO SESSIONE
 * Deve essere la primissima cosa. Non devono esserci spazi, 
 * invii o HTML prima del tag <?php in alto.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* 
 * 2. CONNESSIONE AL DATABASE
 * Usiamo require_once per evitare che il file venga caricato 
 * più volte mandando in crash il sistema.
 */
require_once('ConnessioneDb.php');

/* 
 * 3. LOGICA DI CONTROLLO ACCESSI
 * Verifichiamo chi è l'utente e popoliamo le variabili.
 */
if (isset($_SESSION['MatricolaD'])) {
    // Caso: Utente Dipendente
    $matricolaD = $_SESSION['MatricolaD'];
    $tipo = $_SESSION['TipoUser'];
} 
elseif (isset($_SESSION['CodiceCliente'])) {
    // Caso: Utente Cliente
    $CodiceCliente = $_SESSION['CodiceCliente'];
    $tipo = $_SESSION['TipoUser'];
} 
else {
    /* 
     * Caso: Utente NON loggato.
     * header() funziona solo se sessioni.php viene chiamato PRIMA di ogni HTML.
     * exit() è fondamentale per fermare lo script ed evitare "Undefined variable".
     */
    header("Location: index.php");
    exit();
}
?>