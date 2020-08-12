<?php
require_once 'Setting.php';
require_once 'Database.php';


class PDOSetting
{
    private function GetConnection() : PDO
    {
        $db = new Database();
        return $db->getConnection();
    }


    public function GetSetting(int $id)
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `settings` WHERE `id` = ?';
        $stmt = $connection->prepare($sql);

        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return new Setting(
                $res['id'],
                $res['name'],
                $res['value']
            );
        }
        return false;
    }


    public function SetSetting(int $id, string $val)
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'UPDATE settings
                SET `value` = :val
                WHERE id = :sett_id';

        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([':val' => $val, ':sett_id' => $id]);

        //TODO gerer erreur, return
        var_dump($res);
    }
}