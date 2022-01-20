<?php
namespace Core\Model;

use Core\Database\Database;

/**
 * @method array|false findAll() Récupère un tableau d'objets en BDD
 * @method object|false find(int $id) Récupère une objet en fonction d'un id
 * @method bool defaultSave(string $stmt, array $data) Ajoute un objet ou le modifie dans la BDD
 * @method bool delete(int $id) Supprime un objet en BDD
 */
class DefaultModel extends Database{

    /**
     * Nom de la table en BDD
     *
     * @var string
     */
    protected string $table;

    /**
     * Class utilisée pour la récupération de données
     *
     * @var string
     */
    protected string $classe;

    /**
     * Définit la class utilisée pour la récupération de données
     * à partir de la table utilisée
     */
    public function __construct()
    {
        $this->classe = "App\Entity\\". ucfirst($this->table);
        parent::__construct();
    }

    /**
     * Récupère un tableau d'objets en BDD
     *
     * @return array|false
     */
    public function findAll(): array|bool
    {
        return $this->getQuery();
    }

     /**
     * Récupère une objet en fonction d'un id
     *
     * @param integer $id Id de l'objet à récupérer
     * @return object|false
     */
    public function find(int $id): object|bool
    {
        $stmt = "SELECT * FROM $this->table where id = $id";
        return $this->getQuery($stmt, true);
    }

    public function findBy(array $criteria): array|bool
    {
        return [];
    }
    
    public function findOneBy(array $criteria):object|bool
    {
        return false;
    }

    /**
     * Ajoute un objet ou le modifie dans la BDD
     *
     * @param string $stmt Requête à exécuter
     * @param array $data Données à enregistrer
     * @return int|bool
     */
    protected function defaultSave (string $stmt, array $data): int|bool
    {
        $prpr = $this->pdo->prepare($stmt);
        if (str_contains($stmt, "INSERT INTO")) {
            $prpr->execute($data);
            return $this->pdo->lastInsertId();
        } else {
            return $prpr->execute($data);
        }
    }

    /**
     * Supprime un objet en BDD
     *
     * @param integer $id Id de l'objet à supprimer
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $stmt = "DELETE FROM $this->table where id = $id";
        if ($this->pdo->query($stmt) instanceof \PDOStatement) {
            return true;
        }
        return false;
    }

    /**
     * Undocumented function
     *
     * @param string $stmt requête à exécuter pour récupérer les données
     * @param boolean $one si true retourne un objet sinon retourne un tableau d'objets
     * @return object|array
     */
    protected function getQuery(string $stmt = "", bool $one = false): object|array
    {
        if (empty($stmt)) {
            $stmt = "SELECT * FROM $this->table";
        }
        $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, $this->classe);
        if ($one) {
            return $query->fetch();
        }
        return $query->fetchAll();
    }
}