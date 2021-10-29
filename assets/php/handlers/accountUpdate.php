<?php

require_once('../functions/autoload.php');
require_once('../functions/startSession.php');
require_once('../functions/logError.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['senha-input'] ? password_hash($_POST['senha-input'], PASSWORD_DEFAULT) : NULL;
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
        [$_POST['bairro-input'], PDO::PARAM_STR]
    );

    try {
        $users = new UsersController();
        $result = $users->UpdateUserData($data, $_SESSION['userEmail']);
        $_SESSION['userEmail'] = $_POST['email-input'];
        $_SESSION['userfullName'] = ucwords($_POST['nome-input']) . ' ' . ucwords($_POST['sobrenome-input']);
    }
    catch (PDOException $e) {
        logError($e);
        header('Location: /pages/signup.php?internalError=true');
    }
    var_dump($result);

    header('Location: /pages/myAccount.php?accUpdate=' . intval($result));
}
else {
    echo "Método GET";
}