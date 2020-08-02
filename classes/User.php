<?php


class User
{
    private $_id;
    private $_login;
    private $_role;

    public function __construct($id, $login, $role)
    {
        $this->_id = $id;
        $this->_login = $login;
        $this->_role = $role;
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