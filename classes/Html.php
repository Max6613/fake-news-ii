<?php


class Html
{
    private $_tag;
    private $_attributes;
    private $_value;
    private $_child;


    /**
     * Html constructor.
     * @param string $tag
     * @param array|null $attributes
     * @param string|null $value
     * @param Html|null $children
     */
    public function __construct(string $tag, array $attributes = null, string $value = null, array $children = null)
    {
        $this->_tag = $tag;
        $this->_attributes = $attributes;
        $this->_value = $value;
        $this->_child = $children;
    }


    public function ToStr() : string
    {
        $html = '<' . $this->_tag;
        if (!empty($this->_attributes)){
            foreach ($this->_attributes as $attr => $val){
                $html .= ' ' . $attr;
                if (!empty($val)){
                    $html .= '="' . $val . '"';
                }
            }
        }
        $html .= '>';

        if (!empty($this->_value)){
            $html .= $this->_value;
        }

        if (!empty($this->_child)){
            foreach ($this->_child as $child){
                if (!empty($child) && get_class($child) == 'Html'){
                    $html .= $child->ToStr();
                }
            }
        }

        $html .= '</' . $this->_tag . '>';

        return $html;
    }
}