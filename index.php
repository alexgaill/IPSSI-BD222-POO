<?php

require "Classe/Animaux/Chien.php";
// On instancie chien en lui passant les paramètres attendus dans le cosntruct
// $chien1 = new Chien(nom: "Pepper", couleur: "gris", race: "lévrier", age: 3);
$chien1 = new Chien("Pepper", "gris", "lévrier", 3);
// var_dump($chien1);
echo "<br>";
echo $chien1->getNom();
echo $chien1->setNom("Saucisse");
echo "<br>";
echo $chien1->getNom();
echo "<br>";
// S'il manque l'un des paramètres attendus dans le construct, 
// le script nous retourne une erreur
$chien2 = new Chien("Rex", "marron", "chihuahua", 4);
// var_dump($chien2);
// $chien3 = new Chien(444, ["marron", "noir"], "chihuahua", "4 ans");
// $chien2->setNom("Saucisse")->setCouleur("gris")->setAge(5); // Possible grâce aux return $this des setter qui correspond au design pattern fluent