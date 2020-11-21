<?php


class Html
{
    private $_tag;
    private $_attributes;
    private $_value;
    private $_child;
    private $_orphan;


    /**
     * Html constructor.
     * @param string $tag
     * @param array|null $attributes
     * @param string|null $value
     * @param array|null $children
     * @param bool $orphan
     */
    public function __construct(string $tag, array $attributes = null, string $value = null, array $children = null, bool $orphan = false)
    {
        $this->_tag = $tag;
        $this->_attributes = $attributes;
        $this->_value = $value;
        $this->_child = $children;
        $this->_orphan = $orphan;
    }


    //@Override
    public function __toString() : string
    {
        //ouverture de la balise
        $html = '<' . $this->_tag;

        if (!empty($this->_attributes)){
            //Ajout des attributs
            foreach ($this->_attributes as $attr => $val){
                $html .= ' ' . $attr;
                if (!empty($val)){
                    $html .= '="' . $val . '"';
                }
            }
        }
        $html .= '>';

        //Si balise orpheline, renvoi du texte
        if ($this->_orphan){
            return $html;
        }

        //Ajout de texte dans la balise
        if (!empty($this->_value)){
            $html .= $this->_value;
        }

        //Ajout de balise enfant par récursivité
        if (!empty($this->_child)){
            foreach ($this->_child as $child){
                if ($child && get_class($child) == 'Html'){
                    $html .= $child->__toString();
                }
            }
        }

        $html .= '</' . $this->_tag . '>';

        return $html;
    }
}