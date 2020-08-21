<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'classes/PDOArticle.php';


if (!isset($_GET['id'])) {
    header('Location: /');
}

if (!empty($_GET['id'])){
    $pdoArticle = new PDOArticle();
    $art = $pdoArticle->GetArticleById($_GET['id']);
}
?>

<body>
    <div class="wrapper">

        <?php require_once 'inc/burger_btn.php'; ?>

        <header class="container">

            <?php require_once 'inc/nav.php'; ?>

            <div class="title">
                <div class="fake-logo">
                    <a href="index.php">Fake News II</a>
                </div>
                <h1><?php echo $art->getTitle() ?></h1>
            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>
        <main>

        <?php
        if (get_class($art) == 'Article'){
            $art->ToModifForm();
        }
        ?>

        </main>

        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
    <script type="application/javascript" src="scripts/js/img_preview.js"></script>
</body>
</html>