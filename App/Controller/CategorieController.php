<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Model\CategorieModel;
use Core\Controller\DefaultController;
use Exception;

class CategorieController extends DefaultController
{


    public function __construct()
    {
        $this->model = new CategorieModel;
    }

    /**
     * Page présentant la liste des catégories du blog
     *
     * @return void
     */
    public function index()
    {
        $this->render("categorie/index", [
            "categories" => $this->model->findAll()
        ]);
    }

    /**
     * Page présentant une catégorie
     *
     * @return void
     */
    public function single()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            $this->render("categorie/single", [
                "categorie" => $this->model->find($_GET["id"])
            ]);
        } else {
            // TODO: Rediriger vers une autre page
            throw new Exception("La redirection est manquante");
        }
    }

    /**
     * Page d'ajout d'une catégorie dans la BDD
     *
     * @return void
     */
    public function save()
    {
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $categorie = new Categorie($_POST);
            if ($this->model->save($_POST)) {
                // TODO: Rediriger vers une autre page
                throw new Exception("La redirection est manquante");
            } else {
                $error =  "Une erreur s'est produite merci de réessayer";
            }
        }
        $this->render("categorie/save");
    }

    /**
     * Page mettant à jour une catégorie
     *
     * @return void
     */
    public function update()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if (isset($_POST["name"]) && !empty($_POST["name"])) {
                if ($this->model->update($_POST, $_GET["id"])) {
                    // TODO: Rediriger vers une autre page
                    throw new Exception("La redirection est manquante");
                } else {
                    $error =  "Une erreur s'est produite merci de réessayer";
                }
            }
            $this->render("categorie/update", [
                "categorie" => $this->model->find($_GET["id"])
            ]);
        }
    }

    /**
     * Page supprimant une catégorie
     *
     * @return void
     */
    public function delete()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ($this->model->delete($_GET["id"])) {
                // TODO: Rediriger vers une autre page
                throw new Exception("La redirection est manquante");
            } else {
                echo "Erreur lors de la suppression";
            }
        }
    }
}
