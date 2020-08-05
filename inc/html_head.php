<?php
define('PAGE_EN_COURS', $_SERVER['PHP_SELF']);
//echo PAGE_EN_COURS;
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Source+Sans+Pro:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styleV2.css">
    <!--    <link rel="stylesheet" href="css/style.css">-->

    <?php
    switch (PAGE_EN_COURS){
        case '/fake-news-php/index.php':
            echo '<link rel="stylesheet" href="css/home.css">';
            break;
        case '/fake-news-php/trucs_en_toc.php':
            echo '<link rel="stylesheet" href="css/trucs.css">';
            break;
    }
    ?>

    <script src="https://kit.fontawesome.com/fda18f4986.js" crossorigin="anonymous"></script>
    <script type="application/javascript" src="Vendor/Jquery/jquery-3.5.1.min.js"></script>

    <title>FAKE NEWS II, Reloaded</title>
</head>