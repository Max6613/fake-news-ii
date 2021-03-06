<?php
require_once 'Database.php';
require_once 'Article.php';


/**
 * Class PDOArticle
 */
class PDOArticle
{
    /**
     * Connexion à la base de données
     * @return PDO|false
     */
    private function GetConnection()
    {
        $db = new Database();
        return $db->getConnection();
    }


    /**
     * @param array $list
     * @return string
     */
    private function ModList(array $list) : string
    {
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


    /**
     * @param int $article_id
     * @return Article|false
     */
    public function GetArticleById(int $article_id)
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
                $res['creation'],
                $res['title'],
                $res['chapo'],
                $res['content'],
                $res['image']);
        }
        return false;
    }


    /**
     * @param int|null $nb
     * @return array|false
     */
    public function GetArticles(int $nb = null)
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'SELECT * FROM `posts` ORDER BY `creation` DESC';
        if ($nb > 0 && $nb != null){
            $sql.= ' LIMIT ' . $nb;
        }

        $res = $connection->query($sql);

        if (!empty($res) && $res != false){
            $articles = [];
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $articles[] = new Article(
                    $row['id'],
                    $row['creation'],
                    $row['title'],
                    $row['chapo'],
                    $row['content'],
                    $row['image']);
            }
            return $articles;
        }
        return false;
    }


    /**
     * @param string $title
     * @param string $chapo
     * @param string $content
     * @param string $img
     * @return bool
     */
    public function SetArticle(string $title, string $chapo, string $content, string $img) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'INSERT INTO posts(`creation`, `title`, `chapo`, `content`, `image`)
                VALUES (:date_crea, :title, :chapo, :content, :image)';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([':date_crea'=>date('Y-m-d H:i:s'),
                                ':title' => $title,
                                ':chapo' => $chapo,
                                ':content' => $content,
                                ':image' => $img
                            ]);

        if (!$res){
            return false;
        }
        return true;
    }


    /**
     * @param int $article_id
     * @param array $mods
     * @return bool
     */
    public function ModArticle(int $article_id, array $mods) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'UPDATE `posts` SET ' . $this->ModList($mods) . ' WHERE `id` = ' . $article_id;
        $res = $connection->query($sql);

        if (!$res){
            return false;
        }
        return true;
    }


    /**
     * @param int $article_id
     * @return bool
     */
    public function DelArticle(int $article_id) : bool
    {
        $connection = $this->GetConnection();
        if (!$connection){
            return false;
        }

        $sql = 'DELETE FROM `posts` WHERE `id` = ?';
        $stmt = $connection->prepare($sql);
        $res = $stmt->execute([$article_id]);

        if(!$res){
            return false;
        }
        return true;
    }
}