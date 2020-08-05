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
                <div class="date">' . $this->_date . '</div>
                <h3>' . $this->_title . '</h3>
                <p>' . $this->_chapo . '</p>
            </div>';
    }


    public function ToStrTrucsPreview(){
        echo
            '<div class="article">
                <div class="date">' . $this->_date . '</div>
                <h3>' . $this->_title . '</h3>
                <div>
                    <img src="' . $this->_img . '" alt="">
                </div>
                <p>' . $this->_chapo . '</p>
                <button>
                    <a href="trucs_en_toc?art=' . $this->_id . '"><i class="far fa-file" aria-hidden="true"></i> JE VEUX LA SUITE !</a>
                </button>
            </div>';
    }


    public function ToStrFullArt(){
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