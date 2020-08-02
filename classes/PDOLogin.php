<?php
require 'Database.php';
require 'User.php';


//TODO PHPdoc
class PDOLogin
{
    public function Authenticate($login, $pswd)
    {
        $db = new Databse();
        //objet pdo
        $connection = $db->getConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM users WHERE login = ? and password = ?';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$login], [$pswd]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return new User($res['id'], res['login'], res['role']);
        }
        //TODO gérer erreur
    }
}