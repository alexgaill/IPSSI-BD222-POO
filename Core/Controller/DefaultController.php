<?php
namespace Core\Controller;

use App\Model\CategorieModel;

class DefaultController {

    /**
     * Génère la page complète à partir d'un template passé avec les paramètres nécessaires
     *
     * @param string $pathView - Chemin du template à insérer dans la base
     * @param array $param - Données nécessaire au template
     * @return void
     */
    public function render(string $pathView, array $param = [])
    {
        ob_start();
        extract($param); // ["foo" => "bar", "test" => "ceci est un test"] => $foo = "bar"; + $test = "ceci est un test";
        require ROOT. "/templates/$pathView.php";
        // $content = ob_get_contents();
        // ob_clean();
        $content = ob_get_clean();
        $navCats = (new CategorieModel)->findAll();
        require ROOT."/templates/base.php";
    }
}