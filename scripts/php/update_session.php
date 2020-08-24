<?php
require_once '../../classes/PDOUser.php';

session_start();

$pdo_user = new PDOUser();
$role = $pdo_user->UpdateSession($_SESSION['id']);

$_SESSION['role'] = $role;