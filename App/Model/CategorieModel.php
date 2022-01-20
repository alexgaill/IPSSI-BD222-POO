<?php
namespace App\Model;

use Core\Model\DefaultModel;

final class CategorieModel extends DefaultModel{

    protected string $table = "categorie";
    
    /**
     * Ajoute une catégorie en BDD
     *
     * @param array $data Données à enregistrer en BDD
     * @return int|boolean
     */ 
    public function save (array $data): int|bool
    {
        return $this->defaultSave("INSERT INTO categorie (name) VALUES (:name)", $data);
    }

    /**
     * Modifie une catégorie en BDD
     *
     * @param array $data Données à enregistrer en BDD
     * @param integer $id Id de la catégorie à modifier
     * @return boolean
     */
    public function update (array $data, int $id): bool
    {
        $stmt = "UPDATE categorie SET name = :name WHERE id = $id";
        return $this->defaultSave($stmt, $data);
    }
}