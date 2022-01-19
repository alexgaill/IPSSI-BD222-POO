<?php

namespace App\Model;

use App\Entity\Article;
use Core\Model\DefaultModel;

class ArticleModel extends DefaultModel
{

    protected string $table = "article"; 

    public function findWithCategorie(int $id): Article
    {
        $stmt = "SELECT article.id as id, title, content, categorie.name 
                    FROM article
                    INNER JOIN categorie ON article.categorie_id = categorie.id
                    WHERE article.id = $id";
        return $this->getQuery($stmt, true);
    }

    public function save(array $data): bool
    {
        $stmt = "INSERT INTO article (title, content, categorie_id, user_id) 
            VALUES (:title, :content, :categorie_id, 1)";
        return $this->defaultSave($stmt, $data);
    }

    public function update(array $data, int $id): bool
    {
        $stmt = "UPDATE article SET
                    title = :title,
                    content = :content,
                    categorie_id = :categorie_id
                    WHERE id = $id";
        return $this->defaultSave($stmt, $data);
    }
}
