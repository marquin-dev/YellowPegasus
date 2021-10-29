<?php
require_once('../functions/autoload.php');
require_once('../functions/logError.php');

$password = password_hash($_POST['senha-input'], PASSWORD_DEFAULT);
$status = isset($_POST['status-input']) ? $_POST['status-input'] : 'user';

$data = array(
    [$_POST['nome-input'], PDO::PARAM_STR],
    [$_POST['sobrenome-input'], PDO::PARAM_STR],
    [$_POST['cpf-input'], PDO::PARAM_STR],
    [$_POST['genero-input'], PDO::PARAM_STR],
    [$_POST['email-input'], PDO::PARAM_STR],
    [$password, PDO::PARAM_STR],
    [$_POST['cep-input'], PDO::PARAM_STR],
    [$_POST['cidade-input'], PDO::PARAM_STR],
    [$_POST['endereco-input'], PDO::PARAM_STR],
    [$_POST['numero-input'], PDO::PARAM_STR],
    [$_POST['bairro-input'], PDO::PARAM_STR],
    [$status, PDO::PARAM_STR]
);

try {
    $users = new UsersController();
    $result = $users->insertNewUser($data);
}
catch (PDOException $e) {
    logError($e);
    header('Location: /register.php?internalError=true');
}

if ($result) {
    session_start();
    setcookie(
        name: session_name(), 
        value: session_id(), 
        domain: $_SERVER['SERVER_NAME'], 
        path: '/'
        // expires_or_options: time() + 31557600
    );
    $_SESSION['userEmail'] = $_POST['email-input'];
    $_SESSION['userfullName'] = ucwords($_POST['nome-input']) . ' ' . ucwords($_POST['sobrenome-input']);
    $_SESSION['userStatus'] = $status;
    header("Location: /");
}
else {
    header('Location: /pages/register.php?signupError=true');
}