<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'classes/PDOArticle.php';

if (isset($_GET['id']) && !empty($_GET['id'])){
    $pdoArticle = new PDOArticle();
    $art = $pdoArticle->GetArticle($_GET['id']);
}
else {
    echo '<div class="error">
            <p>Article indisponible, veuillez réessayer</p>
        </div>';
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
