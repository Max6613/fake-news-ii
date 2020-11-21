<?php
session_start();

if (!(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']) && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'redactor' || $_SESSION['role'] == 'administrator'))
    || !isset($_GET['id'])
    || !isset($_SERVER['HTTP_REFERER'])){

    header('Location: /');
    exit();
}

require_once '../../../classes/PDOArticle.php';

$err = '';
if (!empty($_GET['id'])){
    $pdo_article = new PDOArticle();
    $res = $pdo_article->DelArticle($_GET['id']);

    if (!$res){
        $err = '?err=25';
    }
}

$redirect = $_SERVER['HTTP_REFERER'];
if (strpos($_SERVER['HTTP_REFERER'], 'article_details') != false){
    $redirect = '/article_list.php';
}


header('Location: ' . $redirect . $err);