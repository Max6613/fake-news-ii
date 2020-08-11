<?php
require_once '../../classes/PDOLogin.php';

if (isset($_POST['login']) && isset($_POST['passwd'])){
    $PDOlogin = new PDOLogin();
    $user = $PDOlogin->Authenticate($_POST['login'], $_POST['passwd']);

    if (!$user){
        //Erreur d'identification ou erreur de connexion a la BDD
        header('Location: /connexion.php?err=1');
    }

    else{
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user->getId();
        $_SESSION['user'] = $user->getLogin();
        $_SESSION['role'] = $user->getRole();
        header('Location: /');
    }
}