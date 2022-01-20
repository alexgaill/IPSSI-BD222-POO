<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategorieModel;
use Core\Controller\DefaultController;
use Core\Trait\SecurityDataTrait;

class ArticleController extends DefaultController{

    /**
     * Permet d'utiliser un trait et de charger les propriétés et les méthodes du trait dans la class
     */
    use SecurityDataTrait;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    /**
     * Page d'affichage de la lsite des articles
     *
     * @return void
     */
    public function index()
    {
        $this->render("article/index", [
            "articles" => $this->model->findAll()
        ]);
    }

    /**
     * Page montrant les données un article en fonction de l'id récupéré dans l'url
     *
     * @param int $id
     * @return void
     */
    public function single(int $id)
    {
        // On vérifie qu'on a le bon paramètre au bon format dans l'url
        // if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            
            $this->render("article/single", [
                // "article" => $this->model->findWithCategorie($_GET["id"])
                "article" => $this->model->findWithCategorie($id)
            ]);
        // }
    }

    public function save()
    {
        if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
            (isset($_POST["content"]) && !empty($_POST["content"])) && 
            (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
        ) {
            $result = $this->model->save($this->secureData($_POST));
            if ($result) {
                header("Location: /article/single/$result");
            } else {
                $error =  "Une erreur s'est produite merci de réessayer";
            }
        }

        $this->render("article/save", [
            "categories" => (new CategorieModel)->findAll()
        ]);
    }

    public function update(int $id)
    {
        // if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
                (isset($_POST["content"]) && !empty($_POST["content"])) && 
                (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
            ) {
                if ($this->model->update($_POST, $id)) {
                    header("Location: /article/single/$id");
                } else {
                    $error =  "Une erreur s'est produite merci de réessayer";
                }
            }
            $this->render("article/update", [
                "article" => $this->model->find($id),
                "categories" => (new CategorieModel)->findAll()
            ]);
        // }
    }

    public function delete(int $id)
    {
        // if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ($this->model->delete($id)) {
                header("Location: /article/index");

            } else {
                echo "Erreur lors de la suppression";
            }
        }
    // }
}