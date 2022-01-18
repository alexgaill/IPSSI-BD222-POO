<?php

namespace App\Manager;

use Core\Database\Database;

class ArticleManager extends Database
{


    public function index()
    {
        $stmt = "SELECT * FROM article";
        $query = $this->pdo->query($stmt, \PDO::FETCH_OBJ);
        $articles = $query->fetchAll();
        require ROOT . "/templates/article/index.php";
    }

    public function single()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $stmt = "SELECT article.id as id, title, content, categorie.name 
                    FROM article
                    INNER JOIN categorie ON article.categorie_id = categorie.id
                    WHERE article.id = " . $_GET["id"];
            $query = $this->pdo->query($stmt);
            $article = $query->fetchObject();
            require ROOT . "/templates/article/single.php";
        }
    }

    public function save()
    {
        if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
            (isset($_POST["content"]) && !empty($_POST["content"])) && 
            (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
        ) {
            $stmt = "INSERT INTO article (title, content, categorie_id, user_id) 
            VALUES (:title, :content, :categorie_id, 1)";
            $prpr = $this->pdo->prepare($stmt);
            if ($prpr->execute($_POST)) {
                echo "L'article " . $_POST["title"] . " est sauvegardé";
            }
        }

        $stmtCat = "SELECT * FROM categorie";
        $query = $this->pdo->query($stmtCat, \PDO::FETCH_OBJ);
        $categories = $query->fetchAll();

        require ROOT . "/templates/article/save.php";
    }

    public function update()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
                (isset($_POST["content"]) && !empty($_POST["content"])) && 
                (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
            ) {
                $stmt = "UPDATE article SET
                    title = :title,
                    content = :content,
                    categorie_id = :categorie_id
                    WHERE id = ".$_GET["id"];
                $prpr = $this->pdo->prepare($stmt);
                if ($prpr->execute($_POST)) {
                    echo "L'article " . $_POST["title"] . " est sauvegardé";
                }
            }

            $stmtCat = "SELECT * FROM categorie";
            $query = $this->pdo->query($stmtCat, \PDO::FETCH_OBJ);
            $categories = $query->fetchAll();

            $stmtArt = "SELECT * FROM article where id = " . $_GET["id"];
            $query = $this->pdo->query($stmtArt);
            $article = $query->fetchObject();
            require ROOT . "/templates/article/update.php";
        }
    }

    public function delete()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $stmt = "DELETE FROM article where id = ".$_GET["id"];
            if($this->pdo->query($stmt) instanceof \PDOStatement){
                echo "L'article a été supprimé";
            }
        }
    }
}
