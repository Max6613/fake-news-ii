<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'assets/inc/html_head.php';
require_once 'assets/inc/global.php';

//Si aucun utilisateur connecté ou non administrateur, redirection vers la page d'accueil
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']
    && isset($_SESSION['role']) && $_SESSION['role'] == ADMIN)){

    header('Location: /');
}
?>

<body>
    <div class="wrapper">

        <!-- Bouton de déploiement du menu -->
        <?php require_once 'assets/inc/burger_btn.php'; ?>

        <header class="container">

            <!-- Menu de navigation -->
            <?php require_once 'assets/inc/nav.php'; ?>

            <div class="title">
                <div class="fake-logo">
                    <a href="/">Fake News II</a>
                </div>

                <div id="redac-phrase" class="phrase">

                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(REDAC_PHRASE_ID);
                    require_once 'assets/inc/subtitle.php';
                    ?>

                </div>
            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>

        <main>
            <section class="container">
                <h1>Ajouter un nouvel utilisateur</h1>

                <?php
                //Gestion des erreurs
                if (isset($_GET['err']) && !empty($_GET['err'])){
                    $errs = explode('/', $_GET['err']);

                    foreach ($errs as $err){

                        switch ($err){
                            case 1:
                                $mess = 'Veuillez remplir le formulaire !';
                                break;

                            default:
                                $mess = 'Une erreur est survenue, veuillez réessayer.';
                        }

                        if (isset($mess) && !empty($mess)){
                            require_once 'classes/Html.php';

                            $html = new Html('div', ['class'=>'error'], $mess);
                            echo $html->__toString();
                        }
                    }
                }
                ?>

                <form action="/assets/scripts/php/user_new.php" method="post" enctype="multipart/form-data">
                    <div class="user-login">
                        <label for="title">Identifiant: </label>
                        <input type="text"
                               name="login"
                               id="login"
                               maxlength="100"
                               <?php
                               //Si le champ est spécifié en get (erreur lors du script d'ajout), récupération de la valeur
                               echo (isset($_GET['login']) && !empty($_GET['login'])) ? 'value="' . $_GET['login'] . '"' : '';
                               ?>
                        >
                    </div>

                    <div class="user-password">
                        <label for="title">Mot de passe: </label>
                        <input type="password"
                               name="password"
                               id="password"
                               maxlength="100"
                               <?php
                               //Si le champ est spécifié en get (erreur lors du script d'ajout), récupération de la valeur
                               echo (isset($_GET['password']) && !empty($_GET['password'])) ? 'value="' . $_GET['password'] . '"' : '';
                               ?>
                        >
                    </div>

                    <div class="user-password">
                        <label for="title">Role: </label>
                        <select name="role" id="role">
                            <option value="reader"
                                <?php echo (isset($_GET['role']) && $_GET['role'] == 'reader') ? 'selected' : ''; ?>
                            >Lecteur
                            </option>

                            <option value="redactor"
                                <?php echo (isset($_GET['role']) && $_GET['role'] == 'redactor') ? 'selected' : ''; ?>
                            >Rédacteur
                            </option>

                            <option value="administrator"
                                <?php echo (isset($_GET['role']) && $_GET['role'] == 'administrator') ? 'selected' : ''; ?>
                            >Administrateur
                            </option>
                        </select>
                    </div>

                    <div class="btns">
                        <button type="submit" class="no-link">Ajouter l'utilisateur</button>
                        <button type="reset" class="no-link">Réinitialiser</button>
                    </div>

                </form>
            </section>
        </main>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>
    <script type="application/javascript" src="assets/scripts/js/img_preview.js"></script>

<!--    --><?php
//    //Si utilisateur connecté en tant qu'admin ou redac,
//    // Ajout du script d'administration, permet à certains logo d'administration de fonctionner
//    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
//        && ($_SESSION['role'] == ADMIN || $_SESSION['role'] == REDAC)){
//
//        echo ADMINISTRATION_SCRIPT;
//    }
//    ?>
</body>
</html>