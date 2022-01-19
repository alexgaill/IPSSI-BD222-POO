<?php
namespace App\Model;

use App\Entity\Categorie;
use Core\Database\Database;

class CategorieModel extends Database{

    private $classe = "App\Entity\Categorie";
    /**
     * récupère toutes les catégories de la BDD
     *
     * @return array|false
     */
    public function findAll(): ?array
    {
        $stmt = "SELECT * FROM categorie";
        $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, $this->classe);
        return $query->fetchAll();
    }

    /**
     * Récupère une catégorie en fonction d'un id
     *
     * @param integer $id
     * @return Categorie|false
     */
    public function find(int $id): ?Categorie
    {
        $stmt = "SELECT * FROM categorie where id = ".$_GET["id"];
        $query = $this->pdo->query($stmt);
        return $query->fetchObject($this->classe);
    }

    /**
     * Ajoute un article en BDD
     *
     * @param array $data
     * @return boolean
     */
    public function save (array $data): bool
    {
        $stmt = "INSERT INTO categorie (name) VALUES (:name)";
        $prpr = $this->pdo->prepare($stmt);
        return $prpr->execute($data);
    }

    /**
     * Modifie un article en BDD
     *
     * @param array $data
     * @param integer $id
     * @return boolean
     */
    public function update (array $data, int $id): bool
    {
        $stmt = "UPDATE categorie SET name = :name WHERE id = $id";
        $prpr = $this->pdo->prepare($stmt);
        return $prpr->execute($data);
    }

    /**
     * Supprime un article en BDD
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $stmt = "DELETE FROM categorie where id = " . $_GET["id"];
        if ($this->pdo->query($stmt) instanceof \PDOStatement) {
            return true;
        }
        return false;
    }
}