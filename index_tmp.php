<!DOCTYPE html>
<html lang="fr">
<?php require_once 'inc/html_head.php'; ?>

<body>
    <div class="wrapper">
        <?php
        require_once 'inc/html_burger_btn.php';
        require_once 'inc/html_header.php';
        ?>
        <main>
            <section class="latest-new container">
                <h2>LES DERNIÈRES <strong>FAKE NEWS</strong>!</h2>
                <?php
                require_once 'inc/global.php';
                require_once 'classes/PDOArticle.php';

                //Recuperation des 3 derniers articles
                $pdoArticle = new PDOArticle();
                $res = $pdoArticle->Get3LatestArticles();
                if ($res != false){
                    foreach ($res as $article){
                        $article->ToStrHomePreview();
                    }
                }

                if (!$res): ?>
                    <div class="error">
                        <p>Impossible d'afficher les derniers articles, veuillez réessayer ulterieurement.</p>
                    </div>
                <?php endif; ?>
            </section>

            <aside class="citation">
                <div class="separator">
                    <span></span>
                </div>
                <IMG src="imgs/banner.jpg" align="banniere">
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
Sensorems peregrinationes in camerarius antverpia! Nunquam imperium xiphias. Galataes prarere, tanquam alter adgium.