<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

require_once '../../../classes/PDOUser.php';

if (!empty($_GET['id'])){
    $pdo_user = new PDOUser();
    $pdo_user->DelUser($_GET['id']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);