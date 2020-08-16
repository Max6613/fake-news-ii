<nav id="main-menu">
    <ul>
        <li>
            <a href="/"><i class="fas fa-home ico menu-icon"></i> Rembobiner</a>
        </li>
        <li>
            <a href="trucs_en_toc.php"><i class="fas fa-chart-bar ico menu-icon"></i> Trucs en toc</a>
            <!--TODO sup/garder sous-menu, ?:bonus:? ajouter des tags aux articles pour afficher par catégorie-->
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
            $link = 'connexion.php';
            $text = 'Rouages';
            $sub_ul = '';

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                $link = '/';
                $text = 'Bienvue ';
                $sub_ul = '<ul><li><a href="scripts/php/logout.php"> Se déconnecter</a></li>';

                if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
                    $text .= strtoupper($_SESSION['user']);
                }
                else {
                    $text .= 'Unknow';
                }
            }

            echo '<a href="' . $link . '"><i class="fas fa-cog ico menu-icon"></i> ' . $text . '</a>' . $sub_ul
            ?>

        </li>
    </ul>
</nav>