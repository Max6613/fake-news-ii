<?php
require_once 'assets/inc/global.php';

//Séparation du nom de la page et des attributs GET
define('PAGE_EN_COURS', explode('?', $_SERVER['REQUEST_URI']));
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow, nosnippet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Source+Sans+Pro:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- AJout du CSS spécifique à chaque page -->
    <?php
    require_once 'classes/PDOArticle.php';

    session_start();

    function GetTitleByID(int $id){
        $pdoArticle = new PDOArticle();
        $art = $pdoArticle->GetArticleById($id);

        if ($art && get_class($art) == 'Article'){
            return $art->getTitle();
        }
        return false;
    }

    $style = '';
    $title = 'FAKE NEWS II, Reloaded';
    $fake = ' - Fake News II';

    switch (PAGE_EN_COURS[0]){
        case '/':
        case '/index.php':
            $style = 'home';
            break;

        case '/article_list.php':
            $style = 'article_list';
            $title = 'Trucs en Toc' . $fake;
            break;

        case '/article_details.php':
            $style = 'article_detail';
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $tmp = GetTitleByID($_GET['id']);
                if ($tmp != false){
                    $title = $tmp . $fake;
                }
            }
            break;

        case '/login.php':
            $style = 'login';
            $title = 'Connexion' . $fake;
            break;

        case '/article_mods.php':
            $style = 'article_mod';
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $tmp = GetTitleByID($_GET['id']);
                if ($tmp != false){
                    $title = $tmp . $fake;
                }
            }
            break;

        case '/illegal_mentions.php':
            $title = 'Mentions illégales' . $fake;
            break;

        case '/users.php':
            $title = 'Gestion utilisateurs' . $fake;
            $style = 'users';
            break;

        case '/article_new.php':
            $title = 'Ajout d\'article' . $fake;
            $style = 'form_new';
            break;

        case '/user_new.php':
            $title = 'Ajout d\'utilisateur' . $fake;
            $style = 'form_new';
            break;

        case '/subtitles.php':
            $title = 'Gestion des sous-titres' . $fake;
            $style = 'subtitles';
            break;
    }

    if (!empty($style)) {
        echo '<link rel="stylesheet" href="/assets/css/' . $style . '.css">';
    }


//    if (IS_REDAC){
//        echo '<link rel="stylesheet" href="/assets/css/administration.css">';
//    } TODO supp si inutilisé
    ?>

    <script src="https://kit.fontawesome.com/fda18f4986.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="/vendor/Jquery/jquery-3.5.1.min.js"></script>

    <title><?php echo $title ?></title>
</head>