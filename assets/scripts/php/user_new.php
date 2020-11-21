<?php
require_once '../../../classes/PDOUser.php';

session_start();

//Si l'utilisateur connecté n'est pas administrateur => renvoi à l'accueil
if ( !isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])
    || !isset($_SESSION['role']) || $_SESSION['role'] != 'administrator'){

    header('Location: /');
}

if (isset($_POST['login']) && !empty($_POST['login'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['role']) && !empty($_POST['role'])){



    //Ajout de l'utilisateur en BDD
    $pdo_user = new PDOUser();
    $res = $pdo_user->SetUser(
        $_POST['login'],
        hash('SHA512', trim($_POST['password'])),
        $_POST['role']
    );

    //L'utilisateur a été enregistré => renvoi vers la liste des utilisateurs
    if ($res){
        header('Location: /users.php');
        die();
    }

}
header('Location: /login.php?err=1');