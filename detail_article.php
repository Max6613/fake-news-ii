<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'classes/PDOArticle.php';
require_once 'classes/Html.php';

//Récupération de l'article
if (isset($_GET['id']) && !empty($_GET['id'])){
    $pdoArticle = new PDOArticle();
    $art = $pdoArticle->GetArticleById($_GET['id']);
}

//Si l'id n'est pas spécifié, retour a l'accueil
else {
    header('Location: /');
}
?>

<body>
    <div class="wrapper">

        <?php require_once 'inc/burger_btn.php'; ?>

        <header class="container">

            <?php
            require_once 'inc/nav.php';

            //Si aucun article n'a été récupéré, message d'erreur
            if (!$art){
                $html = new Html('div', ['class'=>'error'], 'Cet article n\'existe pas, ou a été supprimé.');
                echo $html->__toString();
            }
            ?>

            <div class="title">

                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <h1>
                    <?php
                    if (get_class($art) == 'Article'){
                        echo $art->getTitle();
                    }
                    ?>
                </h1>
            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>

        <main class="container">

            <?php
            //Gestion des erreurs
            if (isset($_GET['err']) && !empty($_GET['err'])){
                require_once 'classes/Html.php';

                switch (($_GET['err'])){

                    case 1:
                        $mess = 'Erreur lors du chargement de l\'article';
                        break;

                    case 25:
                        $mess = 'Erreur lors de la suppression de l\'article';
                        break;

                    default:
                        $mess = 'Une erreur est survenue, veuillez réessayer !';
                }
                $html = new Html('div', ['class'=>'error'], $mess);
            }

            //Affichage de l'article
            if (get_class($art) == 'Article'){
                echo $art->ToStrFullArt();
            }
            ?>

        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
</body>
</html>
