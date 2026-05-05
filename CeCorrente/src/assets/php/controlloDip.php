<?php

if (session_status() === PHP_SESSION_NONE) {
    // Configurazione rigorosa dei parametri del cookie di sessione
    session_set_cookie_params([
        'httponly' => true,  // Impedisce l'accesso al cookie tramite script (Protezione XSS)
        'secure'   => true,  // FIX: Obbliga il browser a inviare il cookie SOLO su HTTPS
        'samesite' => 'Strict' // Impedisce l'invio del cookie in richieste provenienti da altri siti (Protezione CSRF)
    ]);
    session_start();
}

require_once('ConnessioneDb.php');

$matricolaD = trim($_POST['matricolaD'] ?? '');
$password   = $_POST['password'] ?? '';

if ($matricolaD === '' || $password === '') {
    header('Location: ../../index.php');
    exit();
}

$stmt = $connessione->prepare(
    'SELECT MatricolaD, Password, LivelloDiAutorizzazione, Tipo 
     FROM dipendenti 
     WHERE MatricolaD = ?'
);

if (!$stmt) {
    error_log('Prepare fallito: ' . $connessione->error);
    header('Location: ../../index.php');
    exit();
}

$stmt->bind_param('s', $matricolaD);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: ../../index.php');
    exit();
}

$user = $result->fetch_assoc();
$stmt->close();

// --- VERIFICA PASSWORD + MIGRAZIONE ---
$passwordDb = $user['Password'];

if (password_verify($password, $passwordDb)) {
    // ✔️ già hashata
}
elseif ($password === $passwordDb) {
    // ✔️ password in chiaro → migrazione
    $nuovoHash = password_hash($password, PASSWORD_DEFAULT);
    $update = $connessione->prepare(
        "UPDATE dipendenti SET Password = ? WHERE MatricolaD = ?"
    );

    if ($update) {
        $update->bind_param('ss', $nuovoHash, $user['MatricolaD']);
        $update->execute();
        $update->close();
    }
}
else {
    // ❌ password errata
    header('Location: ../../index.php');
    exit();
}

// --- RIGENERAZIONE ID SESSIONE (Sicurezza post-login) ---
session_regenerate_id(true);

$_SESSION['MatricolaD']  = $user['MatricolaD'];
$_SESSION['LivelloAuto'] = $user['LivelloDiAutorizzazione'];
$_SESSION['TipoUser']    = $user['Tipo'];

// --- REDIRECT ---
header('Location: ../../HomeDipendenti.php');
exit();
?>