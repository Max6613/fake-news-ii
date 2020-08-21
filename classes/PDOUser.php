<?php
require_once 'Database.php';
require_once 'User.php';
require_once 'Html.php';


/**
 * Class PDOUser
 */
class PDOUser
{
    /**
     * @return false|PDO
     */
    private function GetConnection()
    {
        $db = new Database();
        //objet pdo
        $connection = $db->getConnection();
        if (!$connection){
            return false;
        }
        return $connection;
    }


    /**
     * @param $login
     * @param $passwd
     * @return User|false
     */
    public function Authenticate(string $login, string $passwd) : User
    {
        $connection = $this->GetConnection();

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
     * @return array|false
     */
    public function GetAllUsers() : array
    {
        $connection = $this->GetConnection();

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


    public function UsersToHTML(array $users)
    {
        if (!empty($users)){
            $html = '';
            foreach ($users as $user){
//                var_dump($user);

                $admin_attrs = ['value'=>'administrator'];
                $read_attrs = ['value'=>'reader'];
                $redac_attrs = ['value'=>'redactor'];

                //Ajout de l'attribut "selected" à l'option correspondante
                // au role de l'utilisateur actuel
                switch ($user->GetRole()){
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
                $hidden_inp = new Html('input', ['type'=>'hidden', 'name'=>'id', 'value'=>$user->GetId()]);

                //Création du bouton de validation du formulaire
                $btn = new Html('button', ['type'=>'submit', 'disabled'=>null], 'Appliquer');

                //Création du formulaire
                $form = new Html('form', ['action'=>'scripts/php/modif_role_user.php', 'method'=>'POST', 'class'=>'user-role'], null, [$hidden_inp, $select, $btn]);

                //Création du span pour l'id
                $id_span = new Html('span', ['class'=>'user-id'], $user->GetId());

                //Création du span pour le login
                $login_span = new Html('span', ['class'=>'user-login'], $user->GetLogin());

                //Création du bouton de suppression
                $del_span = null;
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && isset($_SESSION['role'])
                    && $_SESSION['role'] == 'administrator' && $_SESSION['id'] != $user->GetId()){
                    $del_span = new Html('span', ['class'=>'user-del ' . $user->GetId()], null, [new Html('i', ['class'=>'fas fa-trash-alt ico mod-icon'])]);
                }

                //Création de la div pour les données de l'utilisateur
                $user_div = new Html('div', ['class'=>'user'], null, [$id_span, $login_span, $form, $del_span]);

                $html.= $user_div->ToStr();

            }
            echo $html;
        }
    }


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
            ':psswd' => hash('SHA512', $psswd),
            ':user_role' => $role
        ]);

        if (!$res){
            return false;
        }
        return true;
    }
}