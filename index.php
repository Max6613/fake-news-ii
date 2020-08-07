<!DOCTYPE html>
<html lang="fr">
<?php require_once 'inc/html_head.php'; ?>

<body>
    <div class="wrapper">
        <?php require_once 'inc/html_burger_btn.php'; ?>
        <header class="container">
            <?php require_once 'inc/html_nav.php'; ?>
            <div class="title">
                <h1 class="fake-logo"><a href="/">FAKE NEWS II</a></h1>
                <div id="phrase">IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL.</div>
            </div>
            <?php require_once 'inc/html_double_sep.php'?>
        </header>
        <main>
            <section class="latest-new container">
                <h2>LES DERNIÈRES <strong>FAKE NEWS</strong>!</h2>
                <div class="flex-article">
                    <?php
                    require_once 'inc/global.php';
                    require_once 'classes/PDOArticle.php';

                    //Recuperation des 3 derniers articles
                    $pdoArticle = new PDOArticle();
                    $res = $pdoArticle->Get3LatestArticles();
                    if (get_class($res[0]) == 'Article'){
                        foreach ($res as $article){
                            $article->ToStrHomePreview();
                        }
                    }

                    if (!$res): ?>
                        <div class="error">
                            <p>Impossible d'afficher les derniers articles, veuillez réessayer ulterieurement.</p>
                        </div>
                    <?php endif; ?>

                </div>
                <button>
                    <a href="/trucs_en_toc.php"><i class="far fa-file"></i> J'EN VEUX ENCORE !</a>
                </button>
            </section>

            <aside class="citation">
                <div class="separator">
                    <span></span>
                </div>
                <IMG src="imgs/banner.jpg" alt="banniere">
                <div class="center container">
                    "ON PEUT TROMPER UNE FOIS MILLE PERSONNES, MAIS ON NE PEUT PAS TROMPER MILLE FOIS UNE PERSONNE."
                    - ÉMILE
                </div>
                <div class="separator">
                    <span></span>
                </div>
            </aside>
        </main>
        <?php require_once 'inc/html_footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/script.js"></script>
</body>
</html>