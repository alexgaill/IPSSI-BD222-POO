<?php
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategorieModel;
use Core\Controller\DefaultController;

class Articlecontroller extends DefaultController{

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
     * @return void
     */
    public function single()
    {
        // On vérifie qu'on a le bon paramètre au bon format dans l'url
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            
            $this->render("article/single", [
                "article" => $this->model->findWithCategorie($_GET["id"])
            ]);
        }
    }

    public function save()
    {
        if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
            (isset($_POST["content"]) && !empty($_POST["content"])) && 
            (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
        ) {
            if ($this->model->save($_POST)) {
                // TODO: Rediriger vers une autre page
                throw new \Exception("La redirection est manquante");
            } else {
                $error =  "Une erreur s'est produite merci de réessayer";
            }
        }

        $this->render("article/save", [
            "categories" => (new CategorieModel)->findAll()
        ]);
    }

    public function update()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ((isset($_POST["title"]) && !empty($_POST["title"])) &&
                (isset($_POST["content"]) && !empty($_POST["content"])) && 
                (isset($_POST["categorie_id"]) && !empty($_POST["categorie_id"]))
            ) {
                if ($this->model->update($_POST, $_GET["id"])) {
                    // TODO: Rediriger vers une autre page
                    throw new \Exception("La redirection est manquante");
                } else {
                    $error =  "Une erreur s'est produite merci de réessayer";
                }
            }
            $this->render("article/update", [
                "article" => $this->model->find($_GET["id"]),
                "categories" => (new CategorieModel)->findAll()
            ]);
        }
    }

    public function delete()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ($this->model->delete($_GET["id"])) {
                // TODO: Rediriger vers une autre page
                throw new \Exception("La redirection est manquante");
            } else {
                echo "Erreur lors de la suppression";
            }
        }
    }
}