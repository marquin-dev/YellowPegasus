<?php
require_once('../functions/autoload.php');
date_default_timezone_set("America/Sao_Paulo");

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $users = new UsersController();
    $email = $_POST['email-input'];
    $senha = $_POST['senha-input'];

    try {
        $users = new UsersController();
        $result = $users->validateUser($email, $senha);
    } 
    catch (PDOException $e) {
        logError($e);
        header("Location: /index.php?internalError=true");
    }

    if ($result) {
        session_start();
        setcookie(
            name: session_name(), 
            value: session_id(), 
            domain: $_SERVER['SERVER_NAME'], 
            path: '/',
            expires_or_options: time() + 31557600 // lifetime
        );
        foreach($result as $k => $v) {
            $_SESSION[$k] = $v;
        } 
        header("Location: /");
    } 
    else {
        header("Location: /index.php?authError=true");
    }

} else {
    echo 'Método GET';
}