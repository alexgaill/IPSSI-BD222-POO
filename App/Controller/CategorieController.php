<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Model\CategorieModel;
use Core\Controller\DefaultController;
use Exception;

final class CategorieController extends DefaultController
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
    public function single(int $id)
    {
            $this->render("categorie/single", [
                "categorie" => $this->model->find($id)
            ]);

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
            $result = $this->model->save($_POST);
            if ($result) {
                header("Location: /categorie/single/$result");
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
    public function update(int $id)
    {
        // if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if (isset($_POST["name"]) && !empty($_POST["name"])) {
                if ($this->model->update($_POST, $id)) {
                    header("Location: /categorie/single/$id");

                } else {
                    $error =  "Une erreur s'est produite merci de réessayer";
                }
            }
            $this->render("categorie/update", [
                "categorie" => $this->model->find($id)
            ]);
        // }
    }

    /**
     * Page supprimant une catégorie
     *
     * @return void
     */
    public function delete(int $id)
    {
        // if (isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) {
            if ($this->model->delete($id)) {
                header("Location: /categorie/index");

            } else {
                echo "Erreur lors de la suppression";
            }
        // }
    }
}
