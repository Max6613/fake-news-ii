<?php
require_once 'Database.php';
require_once 'Html.php';
require_once 'User.php';


/**
 * Class PDOUser
 */
class PDOUser
{
    /**
     * Database connection
     * @return PDO|false
     */
    private function GetConnection()
    {
        $db = new Database();
        return $db->getConnection();
    }


    /**
     * User authentication
     * @param $login
     * @param $passwd
     * @return User|false
     */
    public function Authenticate(string $login, string $passwd)
    {
        $connection = $this->GetConnection();
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


    /**
     * Get all users in an array
     * @return array|false
     */
    public function GetAllUsers()
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT `id`, `login`, `role` FROM `users`';
        $res = $connection->query($sql);

        if (!empty($res) && $res != false){
            $users = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $users[] = new User($row['id'], $row['login'], $row['role']);
            }
            return $users;
        }

        return false;
    }


    /**
     * User role modification
     * @param int $user_id
     * @param string $role
     * @return bool
     */
    public function ModRole(int $user_id, string $role) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'UPDATE `users` SET `role` = ? WHERE `id` = ?';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([$role, $user_id]);

        if (!$res){
            return false;
        }
        return true;
    }


    /**
     * Deleting a user
     * @param int $user_id
     * @return bool
     */
    public function DelUser(int $user_id) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'DELETE FROM `users` WHERE `id` = ?';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([$user_id]);

        if(!$res){
            return false;
        }
        return true;
    }


    /**
     * Creating a new user
     * @param string $login
     * @param string $psswd
     * @param string $role
     * @return bool
     */
    public function SetUser(string $login, string $psswd, string $role) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'INSERT INTO users(`login`, `password`, `role`)
                VALUES (:login, :psswd, :user_role)';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([
            ':login' => $login,
            ':psswd' => $psswd,
            ':user_role' => $role
        ]);

        if (!$res){
            return false;
        }
        return true;
    }


    /**
     * Update user stored in session
     * @param int $id
     * @return false|mixed
     */
    public function UpdateSession(int $id)
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT `role` FROM users WHERE `id` = ?';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return $res['role'];
        }

        return false;
    }
}