<?php
namespace Core\Controller;

use App\Model\CategorieModel;

class DefaultController {

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