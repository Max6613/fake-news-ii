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


    public function __toString(int $type) : string
    {
        switch ($type){
            //preview on 'accueil'
            case 1:
                echo
                '<div class="fake-news">
                    <img src="' . $this->_img . '" alt="">
                    <div class="date">' . $this->_date . '</div>
                    <h3>' . $this->_title . '</h3>
                    <p>' . $this->_chapo . '</p>    
                </div>';
                break;

            //preview on 'trucs en toc'
            case 2:
                echo
                '<div class="fake-news">
                    <div class="date">' . $this->_date . '</div>
                    <img src="' . $this->_img . '" alt="">
                    <h3>' . $this->_title . '</h3>
                    <p>' . $this->_chapo . '</p>    
                    <button>
                        <a href="trucs_en_toc?art=' . $this->_id . '"><i class="far fa-file" aria-hidden="true"></i> JE VEUX LA SUITE !</a>
                    </button>
                </div>';
                break;

            //full article
            case 3:
                echo
                '<h3>' . $this->_title . '</h3>
                <div class="separator-double">
                    <span></span>
                    <span></span>
                </div>
                <div class="article">
                    <div class="date">' . $this->_date . '</div>
                    <img src="' . $this->_img . '" alt="">
                    <p>' . $this->_chapo . '</p>    
                    <p>' . $this->_content . '</p>
                </div>';
                break;
        }
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