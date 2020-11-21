<?php
require_once 'PDOSetting.php';


class Setting
{
    private $_id;
    private $_name;
    private $_value;

    /**
     * Setting constructor.
     * @param $id
     * @param $name
     * @param $value
     */
    public function __construct(int $id, string $name, string $value)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_value = $value;
    }


    public function __toString()
    {
        /*
         <div class="setting">
             <span>accueil</span>
             <form action="assets/scripts/php/setting_mod.php">
                 <input type="text" name="">
        <button type="submit">Appliquer</button>
             </form>
         </div>
         */
        //Création d'un input caché pour l'id du Setting
        $inp_id = new Html('input', ['type'=>'hidden', 'name'=>'id', 'value'=>$this->_id]);

        //Création de l'input du sous-titre
        $input = new Html('input', ['type'=>'text', 'name'=>'value', 'value'=>$this->_value], null, [], true);

        //Création du bouton de validation du formulaire
        $btn = new Html('button', ['type'=>'submit'], 'Appliquer');

        //Création du form
        $form = new Html('form', ['action'=>'assets/scripts/php/setting_mod.php', 'method'=>'post', 'class'=>'subtitle-value'], null, [$inp_id, $input, $btn]);

        //Création du span pour le nom de la page
        $name = '';
        switch ($this->_name){
            case '#index-phrase':
                $name = 'Accueil';
                break;
            case '#truc-phrase':
                $name = 'Articles';
                break;
            case '#redac-phrase':
                $name = 'Nouvel article';
                break;
            case '#admin-phrase':
                $name = 'Administration';
                break;
            case '#mention-phrase':
                $name = 'Mentions illégales';
                break;
        }
        $span = new Html('span', ['class'=>'subtitle-name'], $name);

        //Création de la div d'un sous-titre
        $subtitle_div = new Html('div', ['class'=>'subtitle'], null, [$span, $form]);

        return $subtitle_div->__toString();
    }


    /**
     * @return int
     */
//    public function getId(): int
//    {
//        return $this->_id;
//    }

    /**
     * @return string
     */
//    public function getName() : string
//    {
//        return $this->_name;
//    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->_value;
    }

    /**
     * @param string $value
     */
//    public function setValue(string $value)
//    {
//        $this->_value = $value;
//
//        $pdo_sett = new PDOSetting();
//        $pdo_sett->SetSetting($this->_id, $value);
//    }
}