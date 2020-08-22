<?php
//ID en table settings
define('INDEX_PHRASE_ID', 11);
define('TRUC_PHRASE_ID', 12);
define('REDAC_PHRASE_ID', 13);
define('ADMIN_PHRASE_ID', 14);
define('MENTION_PHRASE_ID', 15);


//Icone de modification des sous-titres
define('MOD_LOGO', '<span class="mod-logo"><i class="fas fa-edit ico mod-icon"></i></span>');
define('ADD_LOGO', '<a href="new_article.php" class="add-logo"><i class="fas fa-plus-circle ico mod-icon"></i> Nouvel article</a>');
define('DEL_LOGO', '<span class="del-logo"><i class="fas fa-trash ico mod-icon"></i></span>');

//INFOS par defaut
define('DEFAULT_SUBTITLE', 'IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL');
define('DEFAULT_TITLE', 'Fake News II'); //TODO garder si utilisé

//Scripts
define('ADMINISTRATION_SCRIPT', '<script type="application/javascript" src="scripts/js/administration.js"></script>
                                 <script type="application/javascript" src="scripts/js/modal.js"></script>
                                 <script type="application/javascript" src="scripts/js/create_html.js"></script>');
define('USER_ADMINISTRATION_SCRIPT', '<script type="application/javascript" src="scripts/js/user_administration.js"></script>
                                      <script type="application/javascript" src="scripts/js/modal.js"></script>
                                      <script type="application/javascript" src="scripts/js/create_html.js"></script>');

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