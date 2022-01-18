<?php
namespace App\Manager;

use Core\Database\Database;

class CategorieManager{
    // Définir des méthodes pour chaque page liée aux catégories

    /**
     * Page présentant la liste des catégories du blog
     *
     * @return void
     */
    public function index()
    {
        $pdo = (new Database)->pdo;
        $stmt = "SELECT * FROM categorie";
        $query = $pdo->query($stmt, \PDO::FETCH_OBJ);
        $categories = $query->fetchAll();
        require ROOT."/templates/categorie/index.php";
    }

    /**
     * Page présentant une catégorie
     *
     * @return void
     */
    public function single ()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $pdo = (new Database)->pdo;
            $stmt = "SELECT * FROM categorie where id = ".$_GET["id"];
            $query = $pdo->query($stmt);
            // $categorie = $query->fetch(\PDO::FETCH_OBJ);
            $categorie = $query->fetchObject();
            require ROOT."/templates/categorie/single.php";
        }
    }

    public function save()
    {
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $pdo = (new Database)->pdo;
            $stmt = "INSERT INTO categorie (name) VALUES (:name)";
            $prpr = $pdo->prepare($stmt);
            if($prpr->execute($_POST)){
                echo "La categorie ". $_POST["name"] ." a été enregistrée";
            }
        }
        require ROOT."/templates/categorie/save.php";
    }

    public function update()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $pdo = (new Database)->pdo;

            if (isset($_POST["name"]) && !empty($_POST["name"])) {
                $stmt = "UPDATE categorie SET name = :name WHERE id = ". $_GET["id"];
                $prpr = $pdo->prepare($stmt);
                if($prpr->execute($_POST)){
                    echo "La categorie ". $_POST["name"] ." a été modifiée";
                }
            }

            $stmt = "SELECT * FROM categorie where id = ".$_GET["id"];
            $query = $pdo->query($stmt);
            $categorie = $query->fetchObject();
            require ROOT."/templates/categorie/update.php";
        }
    }

    public function delete()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $pdo = (new Database)->pdo;

            $stmt = "DELETE FROM categorie where id = ".$_GET["id"];
            if($pdo->query($stmt) instanceof \PDOStatement){
                echo "La catégorie a été supprimée";
            }
        }
    }
}