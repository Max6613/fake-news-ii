<?php


/**
 * Class Database
 */
class Database
{
    private $_host;
    private $_user;
    private $_password;
    private $_db_name;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->_host = 'localhost';
        $this->_user = 'root';
        $this->_password = '';
        $this->_db_name = 'fakenewsii';
    }


    /**
     * @return PDO|false
     */
    public function getConnection()
    {
        $dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_db_name;
        $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

        try{
            return new PDO($dsn, $this->_user, $this->_password, $options);
        }catch (PDOException $ex){
            //TODO gérer erreur
        }
        return false;
    }
}