<?php
require_once '../../classes/PDOUser.php';

//TODO ajouter longueur min et max

if (isset($_POST['login']) && !empty($_POST['login'])
    && isset($_POST['psswd']) && !empty($_POST['psswd'])
    && isset($_POST['role']) && !empty($_POST['role'])){

    $pdo_user = new PDOUser();
    $res = $pdo_user->SetUser($_POST['login'], $_POST['psswd'], $_POST['role']);

    $err = '';
    if (!$res){
        $err = '?err=1';
    }
    header('Location: /users.php' . $err);
}