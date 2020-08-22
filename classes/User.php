<?php


class User
{
    private $_id;
    private $_login;
    private $_role;

    /**
     * User constructor.
     * @param $id
     * @param $login
     * @param $role
     */
    public function __construct($id, $login, $role)
    {
        $this->_id = $id;
        $this->_login = $login;
        $this->_role = $role;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        $admin_attrs = ['value'=>'administrator'];
        $read_attrs = ['value'=>'reader'];
        $redac_attrs = ['value'=>'redactor'];

        //Ajout de l'attribut "selected" à l'option correspondante au role de l'utilisateur actuel
        switch ($this->_role){
            case 'administrator':
                $admin_attrs['selected'] = null;
                break;

            case 'reader':
                $read_attrs['selected'] = null;
                break;

            case 'redactor':
                $redac_attrs['selected'] = null;
                break;
        }

        //Création des options pour le select (role utilisateur)
        $admin_opt = new Html('option', $admin_attrs, 'Administrateur');
        $read_opt = new Html('option', $read_attrs, 'Lecteur');
        $redac_opt = new Html('option', $redac_attrs, 'Rédacteur');

        //Création du select
        $select = new Html('select', ['name'=>'role'], null, [$admin_opt, $read_opt, $redac_opt]);

        //Création d'input caché contenant l'id
        $hidden_inp = new Html('input', ['type'=>'hidden', 'name'=>'id', 'value'=>$this->_id]);

        //Création du bouton de validation du formulaire
        $btn = new Html('button', ['type'=>'submit', 'disabled'=>null], 'Appliquer');

        //Création du formulaire
        $form = new Html('form', ['action'=>'scripts/php/modif_role_user.php', 'method'=>'POST', 'class'=>'user-role'], null, [$hidden_inp, $select, $btn]);

        //Création du span pour l'id
        $id_span = new Html('span', ['class'=>'user-id'], $this->_id);

        //Création du span pour le login
        $login_span = new Html('span', ['class'=>'user-login'], $this->_login);

        //Création du bouton de suppression
        $del_span = null;
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
            && $_SESSION['role'] == 'administrator' && $_SESSION['id'] != $this->_id){
            $del_span = new Html('span', ['class'=>'user-del ' . $this->_id], null, [new Html('i', ['class'=>'fas fa-trash-alt ico mod-icon'])]);
        }

        //Création de la div pour les données de l'utilisateur
        $user_div = new Html('div', ['class'=>'user'], null, [$id_span, $login_span, $form, $del_span]);

        return $user_div->__toString();
    }


    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getLogin() : string
    {
        return $this->_login;
    }

    /**
     * @return string
     */
    public function getRole() : string
    {
        return $this->_role;
    }
}