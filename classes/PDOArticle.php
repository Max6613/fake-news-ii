<?php
require_once 'Database.php';
require_once 'Article.php';

//TODO PHPdocs, type de retour

class PDOArticle
{
    private function GetConnection() : PDO
    {
        $db = new Database();
        return $db->getConnection();
    }


    private function ModList(array $list){
        $columns = '';
        $cnt = 0;
        foreach ($list as $key => $val) {
            $columns .= '`' .$key . '` = \'' . str_replace('\'', '\'\'', $val) . '\'';

            if ($cnt < count($list) - 1){
                $columns .= ', ';
            }
            $cnt++;
        }

        return $columns;
    }


    public function GetAllArticle(){
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `posts` ORDER BY `date_creation` DESC';
        $res = $connection->query($sql);

        //TODO function commune pour all & 3article
        if (!empty($res) && $res != false){
            $articles = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $articles[] = new Article($row['id'],
                    $row['date_creation'],
                    $row['title'],
                    $row['chapo'],
                    $row['content'],
                    $row['image']);
            }
            return $articles;
        }
        return false;
    }


    public function GetArticle(int $article_id)
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `posts` WHERE id = ?';
        $stmt = $connection->prepare($sql);
        $stmt->execute([$article_id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return new Article($res['id'],
                                $res['date_creation'],
                                $res['title'],
                                $res['chapo'],
                                $res['content'],
                                $res['image']);
        }
        return false;
    }


    public function Get3LatestArticles()
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `posts` ORDER BY `date_creation` DESC LIMIT 3';
        $res = $connection->query($sql);

        if (!empty($res) && $res != false){
            $articles = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $articles[] = new Article($row['id'],
                                            $row['date_creation'],
                                            $row['title'],
                                            $row['chapo'],
                                            $row['content'],
                                            $row['image']);
            }
//            var_dump($articles);
            return $articles;
        }
        return false;
    }


    public function SetArticle(string $title, string $chapo, string $content, string $img) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'INSERT INTO posts(`date_creation`, `title`, `chapo`, `content`, `image`)
                VALUES (:date_crea, :title, :chapo, :content, :image)';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([':date_crea'=>date('Y-m-d H:i:s'),
                                ':title' => $title,
                                ':chapo' => $chapo,
                                ':content' => $content,
                                ':image' => $img
                            ]);
        //TODO gerer erreur, return
        var_dump($res);
    }


    public function ModArticle(int $article_id, array $mods) : bool
    {
        //mods = { 'column' => 'value' }
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        //TODO requete via prepare
        // actuellement retourne une erreur sql
//        $sql = 'UPDATE posts
//                SET ?
//                WHERE id = ?';
//        $stmt = $connection->prepare($sql);
//
//        echo $sql . '<br>';
//        echo $this->ModList($mods) . '<br>';
//        echo $article_id;
//
//        $res = $stmt->execute([$this->ModList($mods), $article_id]);

        $sql = 'UPDATE `posts` SET ' . $this->ModList($mods) . ' WHERE `id` = ' . $article_id;
        $res = $connection->query($sql);


        //TODO gerer erreur, return
//        return $res;
        return true;
    }


    public function DelArticle(int $article_id) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'DELTE FROM posts WHERE `id` = ?';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([$article_id]);
        //TODO gerer erreur, return
        var_dump($res);
    }
}