<?php


class Database
{
    private $_host;
    private $_user;
    private $_password;
    private $_db_name;

    public function __construct()
    {
        $this->_host = 'localhost';
        $this->_user = 'root';
        $this->_password = '';
        $this->_db_name = 'fakenewsii';
    }

    public function getConnection()
    {
        $dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_db_name;

        try{
            $pdo = new PDO($dsn, $this->_user, $this->_password);
            return $pdo;
        }catch (PDOException $ex){
            var_dump($ex);
            //TODO message erreur via GET ou SESSION ?
            echo "Unable to connect to database";
        }
        return false;
    }
}