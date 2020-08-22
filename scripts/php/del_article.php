<?php
session_start();

if (!(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'redactor' || $_SESSION['role'] == 'administrator'))
    || !isset($_GET['id'])
    || !isset($_SERVER['HTTP_REFERER'])){

    header('Location: /');
    exit();
}

require_once '../../classes/PDOArticle.php';

$err = '';
if (!empty($_GET['id'])){
    $pdo_article = new PDOArticle();
    $res = $pdo_article->DelArticle($_GET['id']);

    if (!$res){
        $err = '?err=25';
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER'] . $err);