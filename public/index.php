<?php
// Permet de définir une constante comme const

use App\Controller\CategorieController;

define("ROOT", dirname(__DIR__));

require ROOT. "/vendor/autoload.php";

// (new CategorieManager)->index();
(new CategorieController)->save();