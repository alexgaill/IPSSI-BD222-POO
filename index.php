<?php

$num1 =3;
$num2 = 7;
$num3 = 12;
$num4 = 56;

// echo addition($num1, $num2, $num3, $num4);

//Pour utiliser notre class, il faut la charger avec un require
require "Classe/MathOperation.php";

/**
 * On instancie la class pour obtenir un objet
 */
$math = new MathOperation();
var_dump($math);
echo "<br>";
echo $math->addition($num1, $num2, $num3, $num4);
echo "<br>";

require "Classe/MaClass.php";

$maclass = new MaClass;
var_dump($maclass);
echo "<br>";
echo $maclass->prop2;
echo "<br>";
echo $maclass->getProp1();
echo "<br>";
echo $maclass->methodeWithParam("Salut");
// echo $maclass->prop1; // inaccessible car private
