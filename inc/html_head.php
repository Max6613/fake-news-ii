<?php
require_once 'inc/global.php';

//Séparation du nom de la page et des attributs GET
define('PAGE_EN_COURS', explode('?', $_SERVER['REQUEST_URI']));
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Source+Sans+Pro:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- AJout du CSS spécifique à chaque page -->
    <?php
    require_once 'classes/PDOArticle.php';

    session_start();

    function GetTitleByID(int $id){
        $pdoArticle = new PDOArticle();
        $art = $pdoArticle->GetArticle($id);

        if (get_class($art) == 'Article'){
            return $art->getTitle();
        }
        return false;
    }

    $style = '';
    $title = 'FAKE NEWS II, Reloaded';
    switch (PAGE_EN_COURS[0]){
        case '/':
        case '/index.php':
            $style = 'home';
            break;

        case '/trucs_en_toc.php':
            $style = 'trucs';
            $title = 'Trucs en Toc - Fake News II';
            break;

        case '/detail_article.php':
            $style = 'detail';
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $tmp = GetTitleByID($_GET['id']);
                if ($tmp != false){
                    $title = $tmp . ' - Fake News II';
                }
            }
            break;

        case '/connexion.php':
            $style = 'connexion';
            $title = 'Connexion - Fake News II';
            break;

        case '/article_mod.php':
            $style = 'article_mod';
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $tmp = GetTitleByID($_GET['id']);
                if ($tmp != false){
                    $title = $tmp . ' - Fake News II';
                }
            }
            break;

        case '/mentions_illegales.php':
            $title = 'Mentions illégales - Fake News II';

            break;
    }

    if (!empty($style)) {
        echo '<link rel="stylesheet" href="css/' . $style . '.css">';
    }


    if (IS_REDAC){
        echo '<link rel="stylesheet" href="css/administration.css">';
    }
    ?>

    <script src="https://kit.fontawesome.com/fda18f4986.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="Vendor/Jquery/jquery-3.5.1.min.js"></script>

    <title><?php echo $title ?></title>
</head>