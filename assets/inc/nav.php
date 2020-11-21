<nav id="main-menu">

    <ul>
        <li><a href="/"><i class="fas fa-home ico menu-icon"></i> Rembobiner</a></li>

        <li>
            <a href="/project_subject.php"><i class="fas fa-file ico menu-icon"></i> Projet</a>

            <ul>
                <li><a href="/project_subject.php">Sujet</a></li>

                <li><a href="https://github.com/Max6613/fake-news-ii">Github</a></li>
            </ul>
        </li>

        <li>
            <a href="/article_list.php"><i class="fas fa-chart-bar ico menu-icon"></i> Trucs en toc</a>

            <ul>
                <li><a href="#">Faux</a></li>

                <li><a href="#">Contre-vérités</a></li>

                <li><a href="#">Erreurs</a></li>

                <li>
                    <a href="#">Falsifications</a>

                    <ul>
                        <li><a href="#">Faux liens</a></li>

                        <li><a href="#">Fausses tabulations</a></li>

                        <li><a href="#">Faux titres</a></li>
                    </ul>

                </li>

                <li><a href="#">NON</a></li>

            </ul>

        </li>

        <?php
        require_once 'assets/inc/global.php';
        require_once 'classes/Html.php';


        //Utilisateur rédacteur => menu gestion des articles
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
            isset($_SESSION['role']) && ($_SESSION['role'] == REDAC || $_SESSION['role'] == ADMIN)
        ){
            //Tous les articles
            $articles_all_link = new Html('a', ['href'=>'article_list.php'], 'Tous');
            $articles_all = new Html('li', [], null, [$articles_all_link]);
            //Ajouter un article
            $articles_new_link = new Html('a', ['href'=>'article_new.php'], 'Ajouter');
            $articles_new = new Html('li', [], null, [$articles_new_link]);

            //Sous-menu article
            $articles_submenu = new Html('ul', [], null, [$articles_all, $articles_new]);

            //Icone
            $articles_menu_icon = new Html('i', ['class'=>'fas fa-newspaper ico menu-icon']);
            $articles_menu_link = new Html('a', ['href'=>'article_list.php'], $articles_menu_icon->__toString() . ' Articles');

            //Menu articles
            $articles_menu = new Html('li', [], null, [$articles_menu_link, $articles_submenu]);

            echo $articles_menu->__toString();
        }

        //Utilisateur admin => menu gestion des utilisateurs
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
            isset($_SESSION['role']) && $_SESSION['role'] == ADMIN){

            //Tous les utilisateurs
            $articles_all_link = new Html('a', ['href'=>'users.php'], 'Tous');
            $articles_all = new Html('li', [], null, [$articles_all_link]);
            //Ajouter un utilisateur
            $articles_new_link = new Html('a', ['href'=>'user_new.php'], 'Ajouter');
            $articles_new = new Html('li', [], null, [$articles_new_link]);

            //Sous-menu utilisateur
            $articles_submenu = new Html('ul', [], null, [$articles_all, $articles_new]);

            //Icone
            $articles_menu_icon = new Html('i', ['class'=>'fas fa-user ico menu-icon']);
            $articles_menu_link = new Html('a', ['href'=>'users.php'], $articles_menu_icon->__toString() . ' Utilisateurs');

            //Menu utilisateur
            $articles_menu = new Html('li', [], null, [$articles_menu_link, $articles_submenu]);

            echo $articles_menu->__toString();
        }
        ?>

        <li>
            <?php
            //Valeurs par défaut, utilisateur non-connecté
            $link = '/login.php';
            $text = 'Rouages';
            $sub_ul = '';

            //Utilisateur connecté
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                $link = '/';
                $text = 'Bienvue ';

                if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $text .= strtoupper($_SESSION['user']);
                }
                else {
                    $text .= 'Unknow';
                }
            }

            //"BIENVENUE (user)"
            $icon = new Html('i', ['class'=>'fas fa-cog ico menu-icon']);
            $link = new Html('a', ['href'=>$link], $icon->__toString() . $text);
            echo $link->__toString();

            //Sous-menu
            $sub_menu = [];

            //Si connecté, lien de deconnexion
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                //Utilisateur rédacteur ou admin
                if (isset($_SESSION['role']) && $_SESSION['role'] == REDAC || $_SESSION['role'] == ADMIN){
                    //Gestion des sous-titres
                    $subtitles_link = new Html( 'a', ['href'=>'subtitles.php'], 'Sous-titres');
                    $sub_menu[] = new Html( 'li', [], null, [$subtitles_link]);
                }


                $logout = new Html('a', ['href'=>'assets/scripts/php/logout.php'], 'Se déconnecter');
                $sub_menu[] = new Html('li', [], null, [$logout]);

                $sub_ul = new Html('ul', [], null, $sub_menu);
                echo $sub_ul->__toString();
            }
            ?>

        </li>
    </ul>
</nav>