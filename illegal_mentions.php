<!DOCTYPE html>
<html lang="fr">
<?php
require_once 'assets/inc/html_head.php';
require_once 'assets/inc/global.php';
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
                <div id="mention-phrase" class="phrase">
                    <?php
                    require_once 'classes/PDOSetting.php';

                    //Récuperation et affichage du sous titre
                    $pdo_sett = new PDOSetting();
                    $setting = $pdo_sett->GetSetting(MENTION_PHRASE_ID);
                    require_once 'assets/inc/subtitle.php';
                    ?>
                </div>

            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </header>

        <main class="container">
            <h1>Mentions illégales</h1>

            <div>
                <p>
                    Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses
                    pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi,
                    conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie
                    numérique, les responsables du présent site internet
                    <a href="http://www.fakenewsii.fr" class="a-underline">www.fakenewsii.fr</a> sont :
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Editeur du Site : </h2>
                <p>L'idem</p>
                <p>Numéro de SIRET :  1 35489658752</p>
                <p>Responsable editorial : Maxime FONTANA</p>
                <p>1 Rue Léon Blum</p>
                <p>Téléphone :06 12 34 56 78 - Fax : 06 12 34 56 78</p>
                <p>Email : contact@fakenewsii.fr</p>
                <p>Site Web : <a href="/" class="a-underline">www.fakenewsii.fr</a></p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Hébergement : </h2>
                <p>Hébergeur : lhebergeur-de-site</p>
                <p>123 rue des hebergements</p>
                <p>
                    Site Web :
                    <a href="http://www.lhebergeur-de-site.com" class="a-underline">www.lhebergeur-de-site.com</a>
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Développement : </h2>
                <p>Maxime FONTANA</p>
                <p>Adresse : 999 Rue des inconnus</p>
                <p>Site Web : <a href="http://www.maximefontana.fr" class="a-underline">www.maximefontana.fr</a></p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Conditions d’utilisation : </h2>
                <p>
                    Ce site (<a href="/" class="a-underline">www.fakenewsii.fr</a>) est proposé en différents langages
                    web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d'utilisation et un graphisme plus
                    agréable, nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari,
                    Firefox, Google Chrome, etc… Les mentions légales ont été générées sur le site
                    <a class="a-underline" href="http://www.generateur-de-mentions-legales.com">Générateur de mentions
                    légales</a>, offert par<a class="a-underline" href="http://welye.com">Welye</a>.
                </p>
                <p>
                    <strong>L'idem</strong> met en œuvre tous les moyens dont elle dispose, pour assurer une information
                    fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent
                    survenir. L'internaute devra donc s'assurer de l'exactitude des informations auprès de , et signaler
                    toutes modifications du site qu'il jugerait utile. n'est en aucun cas responsable de l'utilisation
                    faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.
                </p>
                <p>
                    <strong>Cookies</strong> : Le site <a href="/" class="a-underline">www.fakenewsii.fr</a>peut-être
                    amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d'affichage. Un
                    cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il
                    contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel
                    un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent
                    être fonctionnelles sans l’acceptation de cookies.
                </p>
                <p>
                    <strong>Liens hypertextes :</strong> Les sites internet de peuvent offrir des liens vers d’autres
                    sites internet ou d’autres ressources disponibles sur Internet. L'idem ne dispose d'aucun moyen pour
                    contrôler les sites en connexion avec ses sites internet. ne répond pas de la disponibilité de tels
                    sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout
                    dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et
                    notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être
                    fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l'internaute, qui
                    doit se conformer à leurs conditions d'utilisation. Les utilisateurs, les abonnés et les visiteurs
                    des sites internet de ne peuvent mettre en place un hyperlien en direction de ce site sans
                    l'autorisation expresse et préalable de L'idem. Dans l'hypothèse où un utilisateur ou visiteur
                    souhaiterait mettre en place un hyperlien en direction d’un des sites internet de L'idem, il lui
                    appartiendra d'adresser un email accessible sur le site afin de formuler sa demande de mise en place
                    d'un hyperlien. L'idem se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en
                    justifier sa décision.
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Services fournis : </h2>
                <p>
                    L'ensemble des activités de la société ainsi que ses informations sont présentés sur notre site
                    <a href="http://www.fakenewsii.fr" class="a-underline">www.fakenewsii.fr</a>.
                </p>
                <p>
                    L'idem s’efforce de fournir sur le site www.fakenewsii.fr des informations aussi précises que
                    possible. les renseignements figurant sur le site
                    <a href="http://www.fakenewsii.fr" class="a-underline">www.fakenewsii.fr</a> ne sont pas
                    exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant
                    été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le
                    site <strong>www.fakenewsii.fr</strong> sont données à titre indicatif, et sont susceptibles de
                    changer ou d’évoluer sans préavis.
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Limitation contractuelles sur les données : </h2>
                <p>
                    Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à
                    différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions.
                    Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien
                    vouloir le signaler par email, à l’adresse contact@fakenewsii.fr, en décrivant le problème de la
                    manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé,
                    …). Tout contenu téléchargé se fait aux risques et périls de l'utilisateur et sous sa seule
                    responsabilité. En conséquence, ne saurait être tenu responsable d'un quelconque dommage subi par
                    l'ordinateur de l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement.
                    <strong>De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent,
                        ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</strong> Les liens
                    hypertextes mis en place dans le cadre du présent site internet en direction d'autres ressources
                    présentes sur le réseau Internet ne sauraient engager la responsabilité de L'idem.
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Propriété intellectuelle :</h2>
                <p>
                    Tout le contenu du présent sur le site <a href="http://www.fakenewsii.fr" class="a-underline">
                    www.fakenewsii.fr</a>, incluant, de façon non limitative, les graphismes, images, textes, vidéos,
                    animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de
                    la société à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires
                    ou auteurs.  Toute reproduction, distribution, modification, adaptation, retransmission ou
                    publication, même partielle, de ces différents éléments est strictement interdite sans l'accord
                    exprès par écrit de L'idem. Cette représentation ou reproduction, par quelque procédé que ce soit,
                    constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété
                    intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la
                    responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés
                    pourraient intenter une action en justice à votre encontre.
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Déclaration à la CNIL : </h2>
                <p>
                    Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative
                    à la protection des personnes physiques à l'égard des traitements de données à caractère personnel)
                    relative à l'informatique, aux fichiers et aux libertés, ce site n'a pas fait l'objet d'une
                    déclaration  auprès de la Commission nationale de l'informatique et des libertés
                    (<a href="http://www.cnil.fr/">www.cnil.fr</a>).
                </p>
            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Litiges : </h2>
                <p>
                    Les présentes conditions du site <a href="http://www.fakenewsii.fr">www.fakenewsii.fr</a> sont
                    régies par les lois françaises et toute contestation ou litiges qui pourraient naître de
                    l'interprétation ou de l'exécution de celles-ci seront de la compétence exclusive des tribunaux dont
                    dépend le siège social de la société. La langue de référence, pour le règlement de contentieux
                    éventuels, est le français.
                </p>

            </div>

            <?php include 'assets/inc/separator_simple.php' ?>

            <div>
                <h2>Données personnelles :</h2>
                <p>
                    De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous
                    visitez notre site Internet <a href="/" class="a-underline">www.fakenewsii.fr</a>. Cependant, ce
                    principe comporte certaines exceptions. En effet, pour certains services
                    proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que :
                    votre nom, votre fonction, le nom de votre société, votre adresse électronique, et votre numéro de
                    téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans
                    la rubrique « contact ». Dans tous les cas, vous pouvez refuser de fournir vos données personnelles.
                    Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des
                    renseignements sur notre société, ou de recevoir les lettres d’information. Enfin, nous pouvons
                    collecter de manière automatique certaines informations vous concernant lors d’une simple navigation
                    sur notre site Internet, notamment : des informations concernant l’utilisation de notre site, comme
                    les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre
                    navigateur, vos temps d'accès. De telles informations sont utilisées exclusivement à des fins de
                    statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les
                    bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la
                    directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.
                </p>
            </div>

            <?php include 'assets/inc/separator_double.php' ?>

        </main>

    </div>
    <script type="application/javascript" src="assets/scripts/js/menu_deployment.js"></script>

    <?php
    //Si utilisateur connecté en tant qu'admin ou redac,
    // Ajout du script d'administration, permet à certains logo d'administration de fonctionner
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
        && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

        echo ADMINISTRATION_SCRIPT;
    }
    ?>
</body>
</html>