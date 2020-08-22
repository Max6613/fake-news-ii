<?php
if (get_class($setting) == 'Setting'){
    echo $setting->getValue();

    //Si utilisateur connecté en tant qu'admin ou redac,
    // affichage du logo de modification
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

        echo MOD_LOGO;
    }
}

//Si erreur lors de la récuperation du sous-titre, affichage phrase par defaut
else {
    echo DEFAULT_SUBTITLE;
}
?>