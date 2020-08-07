<?php
if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
    header('Location: /');
}

require_once '../../classes/PDOLogin.php';

if (isset($_POST['login']) && isset($_POST['passwd'])){
    $PDOlogin = new PDOLogin();
    $user = $PDOlogin->Authenticate($_POST['login'], $_POST['passwd']);

    var_dump($user);

    if (!$user){
        //Erreur d'identification ou erreur de connexion a la BDD
        header('Location: /connexion.php?err=1');
    }

    else{
        session_start();
        $_SESSION['use'] = $user;
        header('Location: /');
    }
}