<?php
// Permet de définir une constante comme const

use App\Manager\ArticleManager;
use App\Manager\CategorieManager;

define("ROOT", dirname(__DIR__));

require ROOT. "/vendor/autoload.php";

// (new CategorieManager)->index();
(new ArticleManager)->delete();