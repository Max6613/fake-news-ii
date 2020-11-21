<?php
require_once '../../../classes/PDOSetting.php';


if (isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['value']) && !empty($_POST['value'])){

    $pdo_set = new PDOSetting();
    $res = $pdo_set->UpdateSetting($_POST['id'], $_POST['value']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);