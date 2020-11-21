<?php
require_once '../../../classes/PDOArticle.php';

if (isset($_POST['id']) && !empty($_POST['id'])){
    $mods = [];
    $datetime = '';

    foreach ($_POST as $col => $mod){

        switch ($col){
            case 'date':
            case 'time':
                $datetime .= $mod . ' ';
                break;

            case 'image':
                if (empty($mod)){
                    break;
                }
                $mods[$col] = $mod;

            case 'id':
                break;

            default:
                $mods[$col] = $mod;
                break;
        }
    }
    $mods['date_creation'] = $datetime;

    $pdo_art = new PDOArticle();
    $pdo_art->ModArticle($_POST['id'], $mods);
}

header('Location: ../../../article_details.php?id=' . $_POST['id']);