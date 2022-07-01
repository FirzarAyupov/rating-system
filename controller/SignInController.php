<?php

require_once "model/UserProvider.php";
$pdo = require 'db.php';

session_start();

$userProvider = new UserProvider($pdo);

if (isset($_POST['login'], $_POST['password'])) {
    ['login' => $login, 'password' => $password] = $_POST;

    $user = $userProvider->userVerification($login, $password);

    if ($user) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        print_r($user);
        die();

        header('Location: /');
    }
}

include "View/signin.php";
