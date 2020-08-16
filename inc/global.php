<?php
//ID en table settings
define('INDEX_PHRASE_ID', 11);
define('TRUC_PHRASE_ID', 12);


//Icone de modification des sous-titres
define('MODIFICATION_LOGO', '<span class="mod-logo"><i class="fas fa-edit ico mod-icon"></i></span>');

//Scripts
define('ADMINISTRATION_SCRIPT', '<script type="application/javascript" src="scripts/js/administration.js"></script>');

//Conditions
// utilisateur connecté en tant qu'administrateur ou rédacteur
define('IS_REDAC',
    'isset($_SESSION[\'loggedin\']) && $_SESSION[\'loggedin\'] &&
        isset($_SESSION[\'role\']) &&
        ($_SESSION[\'role\'] == \'administrator\' || 
        $_SESSION[\'role\'] == \'redactor\')');
// utilisateur connecté en tant qu'administrateur
define('IS_ADMIN',
    'isset($_SESSION[\'loggedin\']) && $_SESSION[\'loggedin\'] &&
        isset($_SESSION[\'role\']) && $_SESSION[\'role\'] == \'administrator\'');


//define('', '');
//define('', '');
//define('', '');