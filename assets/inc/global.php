<?php
//ID en table settings
define('INDEX_PHRASE_ID', 11);
define('TRUC_PHRASE_ID', 12);
define('REDAC_PHRASE_ID', 13);
define('ADMIN_PHRASE_ID', 14);
define('MENTION_PHRASE_ID', 15);


//Icone de modification des sous-titres
define('MOD_LOGO', '<span class="mod-logo"><i class="fas fa-edit ico mod-icon"></i></span>');
define('ADD_LOGO', '<a href="article_new.php" class="add-logo"><i class="fas fa-plus-circle ico mod-icon"></i> Nouvel article</a>');
define('DEL_LOGO', '<span class="del-logo"><i class="fas fa-trash ico mod-icon"></i></span>');


//INFOS par defaut
define('DEFAULT_SUBTITLE', 'IL REVIENT ET IL EST PAS CONTENT ! MYTHONÉ EN PHP ET MYSQL');


//Scripts
define('ADMINISTRATION_SCRIPT', '<script type="application/javascript" src="assets/scripts/js/administration.js"></script>
                                 <script type="application/javascript" src="assets/scripts/js/modal.js"></script>
                                 <script type="application/javascript" src="assets/scripts/js/create_html.js"></script>');
define('USER_ADMINISTRATION_SCRIPT', '<script type="application/javascript" src="assets/scripts/js/user_administration.js"></script>
                                      <script type="application/javascript" src="assets/scripts/js/modal.js"></script>
                                      <script type="application/javascript" src="assets/scripts/js/create_html.js"></script>');


//Roles utilisateurs
define('ADMIN', 'administrator');
define('REDAC', 'redactor');
define('USER', 'reader');
