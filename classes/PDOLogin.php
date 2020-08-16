<?php
require 'Database.php';
require 'User.php';


/**
 * Class PDOLogin
 */
class PDOLogin
{
    /**
     * @param $login
     * @param $passwd
     * @return User|false
     */
    public function Authenticate(string $login, string $passwd) : User
    {
        $db = new Database();
        //objet pdo
        $connection = $db->getConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM users WHERE login = ? and password = ?';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$login, hash('SHA512', $passwd)]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return new User($res['id'], $res['login'], $res['role']);
        }

        return false;
    }
}