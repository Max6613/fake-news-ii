<?php
require_once '../../classes/PDOSetting.php';

if (isset($_POST['modification']) && !empty($_POST['modification']) &&
    isset($_POST['id']) && !empty($_POST['id'])){
    $pdo_set = new PDOSetting();
    $res = $pdo_set->SetSetting($_POST['id'], $_POST['modification']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);