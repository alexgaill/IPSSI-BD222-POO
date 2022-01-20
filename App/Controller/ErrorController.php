<?php
namespace App\Controller;

use Core\Controller\DefaultController;

class ErrorController extends DefaultController{

    public function pageError()
    {
        $this->render("error/pageError");
    }
}
