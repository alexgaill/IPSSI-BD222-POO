<?php

namespace App\Manager;

use Core\Database\Database;

/**
 * On extends Database afin de pouvoir récupérer pdo directement.
 * Le manager charge les pages du site. 
 * Chaque manager se connecte à la BDD, récupère les informations nécessaire,
 * charge un template et envoie des données vers la BDD pour sauvegarde si besoin.
 */

class ArticleManager extends Database
{
    /**
     * Le constructeur de l'enfant écrase celui du parent. 
     * Si le constructeur du parent est nécessaire, 
     * il est important de mettre dans le constructeur enfant: parent::__construct()
     * pour activer son utilisation
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Page d'affichage de la lsite des articles
     *
     * @return void
     */
    public function index()
    {
        $stmt = "SELECT * FROM article";
        // \PDO::FETCH_OBJ permet de récupérer les données de la BDD 
        // sous forme de class anonyme
        $query = $this->pdo->query($stmt, \PDO::FETCH_OBJ);
        $articles = $query->fetchAll();
        require ROOT . "/templates/article/index.php";
    }

    /**
     * Page montrant les données un article en fonction de l'id récupéré dans l'url
     *
     * @return void
     */
    public function single()
    {
        // On vérifie qu'on a le bon paramètre au bon format dans l'url
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $stmt = "SELECT article.id as id, title, content, categorie.name 
                    FROM article
                    INNER JOIN categorie ON article.categorie_id = categorie.id
                    WHERE article.id = " . $_GET["id"];
            $query = $this->pdo->query($stmt);
            // fetchObject fonctionne comme fetch avec le fetch mode à \PDO::FETCH_OBJ
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
            // On sélectionne toutes les catégories pour les associer au select
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
            // instanceof permet de vérifier si un objet appartient à un class.
            // Renvoie un booléen
            if($this->pdo->query($stmt) instanceof \PDOStatement){
                echo "L'article a été supprimé";
            }
            // is_a — Vérifie si l'objet est une instance d'une classe donnée 
            // ou a cette classe parmi ses parents
            // if ( is_a($this->pdo->query($stmt), "PDOStatement")) {
            //     echo "L'article a été supprimé";
            // }
        }
    }
}
