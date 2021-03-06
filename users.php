<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'assets/inc/global.php';
require_once 'assets/inc/html_head.php';


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

                <div id="admin-phrase" class="phrase">

                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récupération et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(ADMIN_PHRASE_ID);
                    require_once 'assets/inc/subtitle.php';
                    ?>

                </div>

            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>
        <main>
            <section class="container">
                <h1>Gestion des utilisateurs</h1>

                <a href="user_new.php" class="a-underline"><i class="fas fa-plus-circle ico mod-icon"></i> Ajouter un nouvel utilisateur</a>


                <div class="user user-header">
                    <span class="user-id">Numéro</span>
                    <span class="user-login">Identifiant</span>
                    <span class="user-role">Privilège</span>
                    <span class="user-del">Suppression</span>
                </div>

                <?php
                require_once 'classes/PDOUser.php';

                $pdo_user = new PDOUser();
                $users = $pdo_user->GetAllUsers();

                foreach ($users as $user){
                    if ($user && get_class($user) == 'User'){
                        echo $user->__toString();
                    }
                }
                ?>

            </section>
        </main>

        <?php require_once 'assets/inc/footer.php'; ?>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>

    <?php
    //Si utilisateur connecté en tant qu'admin ou redac,
    // ajout du script permettant la modification d'éléments
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
        isset($_SESSION['role']) && $_SESSION['role'] == ADMIN){

        echo USER_ADMINISTRATION_SCRIPT;
    }
    ?>
</body>
</html>