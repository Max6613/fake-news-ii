<nav id="main-menu">
    <ul>
        <li>
            <a href="/"><i class="fas fa-home ico menu-icon"></i> Rembobiner</a>
        </li>
        <li>
            <a href="/trucs_en_toc.php"><i class="fas fa-chart-bar ico menu-icon"></i> Trucs en toc</a>
            <ul>
                <li>
                    <a href="#">Faux</a>
                </li>
                <li>
                    <a href="#">Contre-vérités</a>
                </li>
                <li>
                    <a href="#">Erreurs</a>
                </li>
                <li>
                    <a href="#">Falsifications</a>
                    <ul>
                        <li>
                            <a href="#">Faux liens</a>
                        </li>
                        <li>
                            <a href="#">Fausses tabulations</a>
                        </li>
                        <li>
                            <a href="#">Faux titres</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">NON</a>
                </li>
            </ul>
        </li>
        <li>
            <?php
            require_once 'classes/Html.php';

            $link = '/connexion.php';
            $text = 'Rouages';
            $sub_ul = '';

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
            $sub_ul_li = [];


            //Si admin acces page de gestion des utilisateurs
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] &&
                isset($_SESSION['role']) && $_SESSION['role'] == 'administrator'){
                $users_admin = new Html('a', ['href'=>'users.php'], 'Utilisateurs');
                $sub_ul_li[] = new Html('li', [], null, [$users_admin]);
            }

            //Si connecté, lien de deconnexion
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                $logout = new Html('a', ['href'=>'scripts/php/logout.php'], 'Se déconnecter');
                $sub_ul_li[] = new Html('li', [], null, [$logout]);


                $sub_ul = new Html('ul', [], null, $sub_ul_li);
                echo $sub_ul->__toString();
            }



            ?>

        </li>
    </ul>
</nav>