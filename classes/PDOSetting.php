<?php
require_once 'Setting.php';
require_once 'Database.php';


/**
 * Class PDOSetting
 */
class PDOSetting
{
    /**
     * Connexion à la base de données
     * @return PDO|false
     */
    private function GetConnection() : PDO
    {
        $db = new Database();
        return $db->getConnection();
    }


    /**
     * @param int $id
     * @return Setting|false
     */
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


    /**
     * @param int $id
     * @param string $val
     * @return bool
     */
    public function UpdateSetting(int $id, string $val) : bool
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

        if (!$res){
            return false;
        }
        return true;
    }


    public function GetAllSettings()
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `settings`';
        $res = $connection->query($sql);

        if (!empty($res) && $res != false){
            $settings = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $settings[] = new Setting($row['id'], $row['name'], $row['value']);
            }
            return $settings;
        }

        return false;
    }
}