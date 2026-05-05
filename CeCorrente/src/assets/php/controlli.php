<?php
// --- SESSIONE SICURA ---
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'httponly' => true,
        'secure'   => isset($_SERVER['HTTPS']), // evita problemi in locale
        'samesite' => 'Strict'
    ]);
    session_start();
}

// --- CONNESSIONE DB ---
require_once('ConnessioneDb.php');

// --- INPUT ---
$CodiceCliente = trim($_POST['codiceCliente'] ?? '');
$password      = $_POST['password'] ?? '';

// --- VALIDAZIONE ---
if ($CodiceCliente === '' || $password === '') {
    header('Location: ../../index.php');
    exit();
}

// --- QUERY SICURA ---
$stmt = $connessione->prepare(
    'SELECT CodCliente, Password, Tipo FROM cliente WHERE CodCliente = ?'
);

if (!$stmt) {
    error_log('Prepare fallito: ' . $connessione->error);
    header('Location: ../../index.php');
    exit();
}

$stmt->bind_param('s', $CodiceCliente);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: ../../index.php');
    exit();
}

$user = $result->fetch_assoc();
$stmt->close();

$passwordDb = $user['Password'];

if (password_verify($password, $passwordDb)) {

}
elseif ($password === $passwordDb) {


    $nuovoHash = password_hash($password, PASSWORD_DEFAULT);

    $update = $connessione->prepare(
        "UPDATE cliente SET Password = ? WHERE CodCliente = ?"
    );

    if ($update) {
        $update->bind_param('ss', $nuovoHash, $user['CodCliente']);
        $update->execute();
        $update->close();
    }
}
else {

    header('Location: ../../index.php');
    exit();
}

session_regenerate_id(true);

$_SESSION['CodiceCliente'] = $user['CodCliente'];
$_SESSION['TipoUser']      = $user['Tipo'];

header('Location: ../../HomePageCliente.php');
exit();
?>
