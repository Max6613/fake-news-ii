<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'inc/html_head.php';
require_once 'inc/global.php';
?>

<body>
    <div class="wrapper">

        <!-- Bouton de déploiement du menu -->
        <?php require_once 'inc/burger_btn.php'; ?>

        <header class="container">

            <!-- Menu de navigation -->
            <?php require_once 'inc/nav.php'; ?>

            <div class="title">
                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <div id="truc-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';


                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    //TODO ajouter ADMINISTRATION_PHRASE_ID
                    $setting = $pdo_sett->GetSetting(INDEX_PHRASE_ID);
                    echo $setting->getValue();

                    //Si utilisateur connecté en tant qu'admin ou redac,
                    // affichage du logo de modification
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
                        isset($_SESSION['role']) &&
                        ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){
                        echo MOD_LOGO;
                    }
                    ?>
                </div>
            </div>

            <?php require_once 'inc/double_sep.php' ?>

        </header>
        <main>
            <section class="container">
                <h1>Ajouter un nouvel article</h1>

                <?php
                //Gestion des erreurs
                if (isset($_GET['err']) && !empty($_GET['err'])){
                    switch ($_GET['err']){
                        case 1:
                            $mess = 'Veuillez remplir le formulaire !';
                            break;

                        case 2:
                            $mess = 'L\'extension du fichier est incorrecte !';

                            break;

                        case 3:
                            $mess = 'Le fichier n\'est pas une image !';
                            break;

                        case 4:
                            $mess = 'Erreur, image trop grande !';
                            break;

                        case 5:
                            $mess = 'Une erreur interne a empêché l\'uplaod de l\'image';
                            break;

                        case 6:
                            $mess = 'Problème lors de l\'upload !';
                            break;

                        case 7:
                            $mess = 'Titre trop long';
                            break;

                        case 8:
                            $mess = 'Chapo trop long';
                            break;

                        case 9:
                            $mess = 'Contenu trop long';
                            break;

                        case 10:
                            $mess = 'Fichier corrompu, veuillez utilisé une autre image !';
                            break;

                        case 11:
                            $mess = 'Une erreur est subvenue lors de l\'ajout de l\'article en base de données';
                            break;

                    }

                    if (isset($mess) && !empty($mess)){
                        require_once 'classes/Html.php';

                        $html = new Html('div', ['class'=>'error'], $mess);
                        echo $html->ToStr();
                    }
                }
                ?>

                <form action="/scripts/php/set_article.php" method="post" enctype="multipart/form-data">
                    <div class="art-title">
                        <label for="title">Titre: </label>
                        <input type="text" name="title" id="title" maxlength="100"
                            <?php
                            echo (isset($_GET['title']) && !empty($_GET['title'])) ? 'value="' . $_GET['title'] . '"' : '';
                            ?>
                        >
                    </div>

                    <div class="art-chapo">
                        <label for="chapo">Chapo: </label>
                        <textarea name="chapo" id="chapo" maxlength="300" >
                            <?php
                            echo (isset($_GET['chapo']) && !empty($_GET['chapo'])) ? $_GET['chapo'] : '';
                            ?>
                        </textarea>
                    </div>

                    <div class="art-content">
                        <label for="content">Contenu: </label>
                        <textarea name="content" id="content" maxlength="65535">
                            <?php
                            echo (isset($_GET['content']) && !empty($_GET['content'])) ? $_GET['content'] : '';
                            ?>
                        </textarea>
                    </div>

                    <div class="image">
                        <label for="img-select">Sélectionné une image: </label>
                        <select name="img-select" id="img-select">
                            <option disabled selected value> -- Selectionné une image -- </option>

                            <?php
                            require_once 'classes/PDOArticle.php';
                            require_once 'classes/Html.php';

                             var_dump(scandir('imgs'));

                             $excluded = ['.', '..', 'banner.jpg'];

                             $imgs_list = scandir('imgs');
                             foreach ($imgs_list as $img){
                                 if (!in_array($img, $excluded)){
                                     $html = new Html('option', ['value'=>$img], str_replace('/', '', $img));
                                     echo $html->ToStr();
                                 }
                             }
                            ?>
                        </select>

                        <label for="img">Ou uploader une image: </label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                        <input type="file" name="img" id="image">

                        <!-- Apercu de l'image sélectionné -->
                        <img src="#" alt="" id="img-prev">
                    </div>

                    <div class="btns">
                        <button type="submit">Ajouter l'article</button>
                        <button type="reset">Réinitialiser</button>
                    </div>

                </form>
            </section>
        </main>

        <!-- TODO garder/supprimer? -->
        <?php require_once 'inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="scripts/js/menu_deployment.js"></script>
    <script type="application/javascript" src="scripts/js/img_preview.js"></script>
</body>
</html>