<!DOCTYPE html>
<html lang="fr">
<?php require_once 'inc/html_head.php'; ?>

<body>
    <div class="wrapper">
        <?php require_once 'inc/html_burger_btn.php'; ?>
        <header class="container">
            <?php require_once 'inc/html_nav.php'; ?>
            <div class="title">
                <div class="fake-logo">
                    <a href="index.php">Fake News II</a>
                </div>
                <h1>TRUCS EN TOC</h1>
                <div id="phrase">MAIS PUISQU'ON VOUS DIT QUE C'EST VRAI !</div>
            </div>
            <?php require_once 'inc/html_double_sep.php'?>
        </header>
        <main>
            <section class="latest-news container">
                <?php
                require_once 'inc/global.php';
                require_once 'classes/PDOArticle.php';

                //Recuperation de tous les articles
                //TODO pages de navigation (1,2,3,4,...) via GET
                //  ou bouton afficher la suite (JS+AJAX)

                $pdoArticle = new PDOArticle();
                $res = $pdoArticle->GetAllArticle();
                if (get_class($res[0]) == 'Article'){
                    foreach ($res as $index => $article){
                        $article->ToStrTrucsPreview();
                        //TODO ajouter separator
                        if ($index < count($res) - 1){
                            echo '<div>';
                            include 'inc/html_simple_sep.php';
                            echo '</div>';
                        }
                    }
                }

                if (!$res): ?>
                    <div class="error">
                        <p>Impossible d'afficher les articles, veuillez réessayer ulterieurement.</p>
                    </div>
                <?php endif; ?>
            </section>
        </main>
        <?php require_once 'inc/html_footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/script.js"></script>
</body>
</html>