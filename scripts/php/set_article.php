<?php
//TODO
require_once '../../classes/PDOArticle.php';

//Définition des tailles de champs a respécter
define('TITLE_MAX_LEN', 100);   //Longueur max du titre
define('CHAPO_MAX_LEN', 300);   //Longueur max du champo
define('CONTENT_MAX_LEN', 65536);   //Lonueur max du contenu

define('TARGET', '../../imgs/');    // Repertoire cible
define('MAX_SIZE', 100000);    // Taille max en octets du fichier
define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels


var_dump($_POST);
var_dump($_FILES);

if (isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['chapo']) && !empty($_POST['chapo'])
    && isset($_POST['content']) && !empty($_POST['content'])){

    //Si upload d'une image pour l'article
    if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name'])) {


        //Upload de l'image dans le dossier images du site

        // Tableaux de donnees
        $tabExt = array('jpg','png','jpeg');    // Extensions autorisees
        $infosImg = array();

        // Variables
        $upload = false;
        $ext = '';
        $err_nb = '';

        // On verifie si le champ est rempli
        if( !empty($_FILES['img']['name']) ) {

            // Recuperation de l'extension du fichier
            $ext  = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

            // On verifie l'extension du fichier
            if(in_array(strtolower($ext),$tabExt)) {
                // On recupere les dimensions du fichier
                $infosImg = getimagesize($_FILES['img']['tmp_name']);

                // On verifie le type de l'image
                if($infosImg[2] >= 1 && $infosImg[2] <= 14) {

                    // On verifie les dimensions et taille de l'image
                    if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['img']['tmp_name']) <= MAX_SIZE)) {

                        // Parcours du tableau d'erreurs
                        if(isset($_FILES['img']['error'])
                            && UPLOAD_ERR_OK === $_FILES['img']['error']) {

                            // Si c'est OK, on teste l'upload
                            if(move_uploaded_file($_FILES['img']['tmp_name'], TARGET . $_FILES['img']['name'])) {
                                $upload = true;
                            }
                            else {
                                // Sinon on affiche une erreur systeme
                                $err_nb = 6;
                            }
                        }
                        else {
                            $err_nb = 5;
                        }
                    }
                    else {
                        // Sinon erreur sur les dimensions et taille de l'image
                        $err_nb = 4;
                    }
                }
                else {
                    // Sinon erreur sur le type de l'image
                    $err_nb = 3;
                }
            }
            else {
                // Sinon on affiche une erreur pour l'extension
                $err_nb = 2;
            }
        }
        else{
            $err_nb = 10;
        }
        


        //SI erreur d'upload, redirection vers la page nouvel article, avec message d'erreur
        if (!$upload){
            header('Location: ../../new_article.php?err=' . $err_nb);
        }

        $image = 'imgs/' . $_FILES['img']['name'];

    }

    //Sinon si une image est selectionné dans la liste des images
    elseif (isset($_POST['img-select']) && !empty($_POST['img-select'])) {
        var_dump($_POST);
        $image = 'imgs/' . $_POST['img-select'];
    }

    //Sinon erreur => pas d'image
    else {
        header('Location: ../../new_article.php?err=1');
    }

    //Vérification de la longueur des textes entrés
    $error = '';
    if (!(strlen($_POST['title']) < TITLE_MAX_LEN)){
        $error .= '7/';
    }
    elseif (!(strlen($_POST['chapo']) < CHAPO_MAX_LEN)){
        $error .= '8/';
    }
    elseif (!(strlen($_POST['content']) < CONTENT_MAX_LEN)){
        $error .= '9';
    }

    //Si un/plusieurs champs sont trop longs, renvoi vers la page de création d'article
    // avec valeur des champs de textes en GET pour les réintégrer
    if (!empty($error)){
        header('Location: ../../new_article.php?err=' . $error . '&title=' . $_POST['title'] . '&chapo=' . $_POST['chapo'] . '&content=' . $_POST['content']);
    }


    $pdo_article = new PDOArticle();
    $res = $pdo_article->SetArticle($_POST['title'], $_POST['chapo'], $_POST['content'], $image);

    if ($res){
        $loc = '/';
    }
    else{
        $loc = '../../new_article.php?err=11';
    }
    header('Location: ' . $loc);
}