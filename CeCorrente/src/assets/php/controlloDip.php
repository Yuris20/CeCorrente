<?php

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'httponly' => true,
        'secure'   => isset($_SERVER['HTTPS']),
        'samesite' => 'Strict'
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

// --- SESSIONE ---
session_regenerate_id(true);

$_SESSION['MatricolaD']  = $user['MatricolaD'];
$_SESSION['LivelloAuto'] = $user['LivelloDiAutorizzazione'];
$_SESSION['TipoUser']    = $user['Tipo'];

// --- REDIRECT ---
header('Location: ../../HomeDipendenti.php');
exit();
?>