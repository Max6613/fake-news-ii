<?php
if (!isset($_POST['role']) || empty($_POST['role']) ||
    !isset($_POST['id']) || empty($_POST['id'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

require_once '../../classes/PDOUser.php';

$pdo_user = new PDOUser();
$pdo_user->ModRole($_POST['id'], $_POST['role']);

header('Location: ' . $_SERVER['HTTP_REFERER']);