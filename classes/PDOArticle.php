<?php
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
        foreach ($list as $key => $val) {
            $columns .= $key . ' = ' . $val . ' ' ;
        }
        return $columns;
    }


    /**
     * @param int $article_id
     * @return Article|bool
     */
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


    public function Get3LatestArticles() : array
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `posts` ORDER BY `date_creation` ASC LIMIT 3';
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($res) && $res != false){
            return $res;
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
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'UPDATE posts
                SET :columns
                WHERE id = :article_id';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([':columns' => $this->ModList($mods),
                                ':article_id' => $article_id]);

        //TODO gerer erreur, return
        var_dump($res);
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