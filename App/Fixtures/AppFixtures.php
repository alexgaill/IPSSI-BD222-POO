<?php
namespace App\Fixtures;

use App\Model\ArticleModel;
use App\Model\CategorieModel;
use Faker\Factory;

class AppFixtures {

    public function load()
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 5; $i++) { 
            $categorie = [
                "name" => $faker->sentence(3)
            ];
            $categorieId = (new CategorieModel)->save($categorie);

            for ($j=0; $j < 10; $j++) { 
                $article = [
                    "title" => $faker->sentence(5),
                    "content" => $faker->paragraphs(4, true),
                    "categorie_id" => $categorieId
                ];
                (new ArticleModel)->save($article);
            }
        }

        echo "Données ajoutées en BDD";
        header("refresh: 3; url=/");
    }
}