<?php
require_once 'Html.php';

/**
 * Class Article
 */
class Article
{
    /**
     * @var int
     */
    private $_id;
    /**
     * @var string
     */
    private $_date;
    private $_title;
    private $_chapo;
    private $_content;
    private $_img;

    /**
     * Article constructor.
     * @param $id
     * @param $date
     * @param $title
     * @param $chapo
     * @param $content
     * @param $img
     */
    public function __construct(int $id,
                                string $date,
                                string $title,
                                string $chapo,
                                string $content,
                                string $img)
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_title = $title;
        $this->_chapo = $chapo;
        $this->_content = $content;
        $this->_img = $img;
    }


    /**
     * @return Html
     */
    public function GetAdminIcons() : Html
    {
        $mod_icon = new Html('i', ['class' => 'fas fa-edit ico mod-icon']);
        $link = new Html('a', ['href' => 'mod_article.php?id=' . $this->_id, 'class' => 'mod-logo'], null, [$mod_icon]);

        $del_icon = new Html('i', ['class' => 'fas fa-trash-alt ico mod-icon']);
        $del_span = new Html('span', ['class' => 'del-logo'], null, [$del_icon]);

        return new Html('div', ['class' => 'mod-btns'], null, [$link, $del_span]);
    }


    /**
     * @return string
     */
    public function ToStrHomePreview() : string
    {
        //image
        $img = new Html('img', ['src' => $this->_img, 'alt' => ''], null, null, true);
        $img_div = new Html('div', null, null, [$img]);

        //date
        $date = new Html('span', ['class' => 'date'], $this->_date);
        $date_div = new Html('div', null, null, [$date]);

        //titre
        $title = new Html('h3', null, $this->_title);

        //chapo
        $chapo = new Html('p', null, $this->_chapo);

        //contenu de la div article-mod
        $art_mod_div_cont = [new Html('div', ['class' => 'article ' . $this->_id], null, [$img_div, $date_div, $title, $chapo])];

        //Si utilisateur admin ou redac, ajout des icones de modification/suppression
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
            && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

            $art_mod_div_cont[] = $this->GetAdminIcons();
        }

        $art_mod_div = new Html('div', ['class' => 'article-mod'], null, $art_mod_div_cont);

        return $art_mod_div->__toString();
    }


    /**
     * @return string
     */
    public function ToStrTrucsPreview() : string
    {
        //date
        $date = new Html('span', ['class' => 'date'], $this->_date);
        $art_div_cont = [new Html('div', ['class' => 'left'], null, [$date])];

        //titre
        $art_div_cont[] = new Html('h3', null, $this->_title);

        //image
        $img = new Html('img', ['src' => $this->_img, 'alt' => ''], null, null, true);
        //chapo
        $chapo = new Html('p', null, $this->_chapo);

        //Description (image + chapo)
        $art_div_cont[] = new Html('div', ['class' => 'art-desc'], null, [$img, $chapo]);

        //Bouton acces a l'article
        $btn_icon = new Html('i', ['class' => 'far fa-file']);
        $art_link = new Html('a', ['href' => 'detail_article.php?id=' . $this->_id], $btn_icon->__toString() . ' JE VEUX LA SUITE !');
        $art_div_cont[] = new Html('button', null, null, [$art_link]);

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
            && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

            $art_div_cont[] = $this->GetAdminIcons();
        }

        $art_div = new Html('div', ['class' => 'article ' . $this->_id], null, $art_div_cont);

        return $art_div->__toString();
    }


    /**
     * @return string
     */
    public function ToStrFullArt() : string
    {
        //date
        $date = new Html('span', ['class' => 'date'], $this->_date);
        $art_cont = [new Html('div', ['class' => 'left'], null, [$date])];

        //Si utilisateur admin ou redac, ajout des icones de modification/suppression
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
            && ($_SESSION['role'] == 'administrator' || $_SESSION['role'] == 'redactor')){

            $art_cont[] = $this->GetAdminIcons();
        }

        //image
        $img = new Html('img', ['src' => $this->_img, 'alt' => ''], null, null, true);
        $art_cont[] = new Html('div', null, null, [$img]);

        //chapo
        $art_cont[] = new Html('p', ['class' => 'chapo'], $this->_chapo);

        //contenu
        $art_cont[] = new Html('p', null, $this->_content);



        //article
        $art = new Html('div', ['class' => 'article'], null, $art_cont);

        return $art->__toString();
    }


    /**
     * @return string
     */
    public function ToModifForm() : string
    {
        $date = explode(' ', $this->_date);

        //Id caché
        $form_cont = [new Html('input', ['type' => 'hidden', 'name' => 'id', 'value' => $this->_id], null, null, true)];

        //Titre
        $title_label = new Html('label', ['for' => 'title'], 'Titre: ');
        $title_inp = new Html('input', ['type' => 'text', 'name' => 'title', 'id' => 'title', 'value' => $this->_title], null, null, true);
        $form_cont[] = new Html('div', ['class' => 'art-title'], null, [$title_label, $title_inp]);

        //date
        $date_label = new Html('label', ['for' => 'date'], 'Date et heure: ');
        $date_inp = new Html('input', ['type' => 'date', 'name' => 'date', 'id' => 'date', 'value' => $date[0]], null, null, true);
        $time_inp = new Html('input', ['type' => 'time', 'name' => 'time', 'id' => 'time', 'value' => $date[1]], null, null, true);
        $form_cont[] = new Html('div', ['class' => 'datetime'], null, [$date_label, $date_inp, $time_inp]);

        //image
        $img_label = new Html('label', ['for' => 'image'], 'Image: ');
        $img_inp = new Html('input', ['type' => 'file', 'name' => 'image', 'id' => 'image', 'accept' => 'image/jpeg'], null, null, true);
        $img = new Html('img', ['src' => $this->_img, 'id' => 'img-prev', 'alt' => ''], null, null, true);
        $form_cont[] = new Html('div', ['class' => ''], null, [$img_label, $img_inp, $img]);

        //chapo
        $chapo_label = new Html('label', ['for' => 'chapo'], 'Chapo: ');
        $chapo_text = new Html('textarea', ['name' => 'chapo', 'id' => 'chapo'], $this->_chapo);
        $form_cont[] = new Html('div', ['class' => 'chapo'], null, [$chapo_label, $chapo_text]);

        //contenu
        $content_label = new Html('label', ['for' => 'content'], 'Contenu: ');
        $content_text = new Html('textarea', ['name' => 'content', 'id' => 'content'], $this->_content);
        $form_cont[] = new Html('div', ['class' => 'content'], null, [$content_label, $content_text]);

        //Boutons
        $submit = new Html('button', ['type' => 'submit', 'class' => 'no-link'], 'Modifier l\'article');
        $cancel = new Html('button', ['class' => 'no-link'], 'Annuler');
        $form_cont[] = new Html('div', ['class' => ''], null, [$submit, $cancel]);

        //Formulaire
        $form = new Html('form', ['action' => 'scripts/php/mod_article.php', 'method' => 'POST'], null, $form_cont);

        //article
        $art = new Html('div', ['class' => 'article container'], null, [$form]);

        return $art->__toString();
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }


    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->_date;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->_title;
    }


    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->_chapo;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }


    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->_img;
    }
}