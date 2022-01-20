<?php

use App\Controller\ArticleController;
use Classe\Magique;

define("ROOT", dirname(__DIR__));

require ROOT. "/vendor/autoload.php";
// require ROOT. "/router/router.php";
// require ROOT. "/cours/magiqueRouteur.php";

// On déclare une class anonyme stockée dans une variable
$ano = new class {
    public $prop1 = "Hello ";
    public $prop2 = "World!";

    public function hello()
    {
        return $this->prop1 . $this->prop2;
    }
};

echo $ano->hello();
echo"<br>";
foreach ($ano as $key => $value) {
    echo "La clé $key a la valeur $value";
    echo"<br>";
}