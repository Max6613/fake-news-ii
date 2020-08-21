<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'classes/PDOArticle.php';
require_once 'classes/Html.php';

if (isset($_GET['id']) && !empty($_GET['id'])){
    $pdoArticle = new PDOArticle();
    $art = $pdoArticle->GetArticleById($_GET['id']);

    if (!$art){
        header('Location: /?err=');
    }
}
else {
    $html = new Html('div', ['class'=>'error'], 'Cet article n\'existe pas, ou a été supprimé.');
    echo $html->ToStr();
}
?>

<body>
    <div class="wrapper">

        <?php require_once 'inc/burger_btn.php'; ?>

        <header class="container">

            <?php require_once 'inc/nav.php'; ?>

            <div class="title">

                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <h1><?php echo $art->getTitle() ?></h1>
            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>

        <main>

            <?php
            if (get_class($art) == 'Article'){
                $art->ToStrFullArt();
            }
            ?>

        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
</body>
</html>
