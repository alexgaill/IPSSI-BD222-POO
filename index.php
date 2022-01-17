<?php

// require "Classe/Animaux/Chien.php";
// require_once "Classe/Animaux/Mammifere.php";

// On utilise un autoloader pour charger les class à notre place
// spl_autoload_register(function (string $class) {
//     require "Classe/Animaux/$class.php";
// });
require "Core/Autoload.php";
Autoload::register();   

use Classe\Animaux\Chien;
use Classe\MathOperation;
use Classe\Animaux\Mammifere;


echo (new MathOperation)->addition(1,2);

// On instancie chien en lui passant les paramètres attendus dans le cosntruct
// $chien1 = new Chien(nom: "Pepper", couleur: "gris", race: "lévrier", age: 3);
$chien1 = new Chien("Pepper", "gris", "lévrier", 3);
// var_dump($chien1);
echo "<br>";
echo $chien1->getNom();
$chien1->setNom("Saucisse");
echo "<br>";
echo $chien1->getNom();
echo "<br>";
echo $chien1->getType();
// echo $chien1->type; // Erreur can't access to protected property
echo "<br>";
// S'il manque l'un des paramètres attendus dans le construct, 
// le script nous retourne une erreur
$chien2 = new Chien("Rex", "marron", "chihuahua", 4);
// var_dump($chien2);
// $chien3 = new Chien(444, ["marron", "noir"], "chihuahua", "4 ans");
// $chien2->setNom("Saucisse")->setCouleur("gris")->setAge(5); // Possible grâce aux return $this des setter qui correspond au design pattern fluent

/**
 * L'opérateur de résolution de portée :: est un opérateur utilisé
 * pour récupérer les informations appartenant à une class (et non un objet)
 * Pour utiliser les informations d'une class On doit donc:
 * indiquer la class, utiliser :: puis l'information
 * Class::$property
 */
echo "<br>";
// ::class permet de récupérer le nom de la class
echo Chien::class;
echo "<br>";
// ::ESPECE permet de récupérer la constante ESPECE
echo Chien::ESPECE;
echo "<br>";
// ::$property permet de récupérer la valeur d'une propriété
echo Mammifere::$property;
echo "<br>";
// ::getPropertyPrivate() permet d'appeler la méthode getPropertyPrivate()
echo Mammifere::getPropertyPrivate();
