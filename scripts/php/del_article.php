<?php
if (!isset($_GET['id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

require_once '../../classes/PDOArticle.php';

if (!empty($_GET['id'])){
    $pdoArticle = new PDOArticle();
    $pdoArticle->DelArticle($_GET['id']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);