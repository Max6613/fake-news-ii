<?php


class Article
{
    private $_id;
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


    public function ToStrHomePreview(){
        echo
            '<div class="article">
                <div>
                    <img src="' . $this->_img . '" alt="">
                </div>
                
                <div>
                    <span class="date">' . $this->_date . '</span>
                </div>
                
                <h3>' . $this->_title . '</h3>
                <p>' . $this->_chapo . '</p>
                <a  href="article_mod.php?id=' . $this->_id . '" class="mod-logo"><i class="fas fa-edit mod-icon"></i></a>
            </div>';
    }


    public function ToStrTrucsPreview(){
        echo
            '<div class="article">
                <div class="left">
                    <span class="date">' . $this->_date . '</span>
                </div>
                <h3>' . $this->_title . '</h3>
                <div class="art-desc">
                    <img src="' . $this->_img . '" alt="">
                    <p>' . $this->_chapo . '</p>    
                </div>
                <button>
                    <a href="detail_article.php?id=' . $this->_id . '"><i class="far fa-file" aria-hidden="true"></i> JE VEUX LA SUITE !</a>
                </button>
            </div>';
    }


    public function ToStrFullArt(){
//        TODO refaire images pour responsive avec <picture>
        echo
            '<div class="article container">
                <div>
                    <span class="date">' . $this->_date . '</span>                
                </div>
               
                <div>
                    <picture>
                        <source srcset="/imgs/pic03-1280.jpg" media="(min-width: 993)">
                        <source srcset="/imgs/pic03-640.jpg" media="(min-width: 768)">
                        <img src="' . $this->_img . '" alt="">
                    </picture>
                </div>
                <p>' . $this->_chapo . '</p>
                <p>' . $this->_content . '</p>
                
            </div>';
    }


    public function ToModifForm(){
        //TODO modifier input type date en fonction du resultat
        //TODO ajouter un apercu de l'image actuel/selectionné

        $date = explode(' ', $this->_date);

        echo
        '<div class="article container">
            <form action="scripts/php/mod_article.php" method="POST">
                <input type="hidden" name="id" value="' . $this->_id . '">
                <div class="art_title">
                    <input type="text" name="title" value="' . $this->_title . '">                
                </div>
            
                <div class="datetime">
                    <label for="date">Date et heure: </label>
                    <input type="date" name="date" id="date" value="' . $date[0] . '">
                    <input type="time" name="time" id="time" value="' . $date[1] . '">
                </div>
                
                <div class="image">
                    <label for="image">Image: </label>
                    <input type="file" name="image" id="image" accept="image/jpeg">
                    <img src="' . $this->_img . '" alt="">
                </div>
                
                <div class="chapo">
                    <label for="chapo">Chapo de l\'article: </label>
                    <textarea name="chapo" id="chapo">' . str_replace('"', '\'', $this->_chapo) . '</textarea>
                </div>
                
                <div class="content">
                    <label for="content">Contenu de l\'article: </label>
                    <textarea name="content" id="content">' . str_replace('"', '\'', $this->_content) . '</textarea>
                </div>
                
                <div class="buttons">
                    <button type="submit">Modifier l\'article</button>
                    <button>Annuler</button>
                </div>
                                                
            </form>
        </div>';
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