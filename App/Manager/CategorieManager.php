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
}