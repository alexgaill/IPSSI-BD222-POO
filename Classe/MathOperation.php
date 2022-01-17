<?php
namespace Classe;

/**
 * On déclare une class avec le mot-clé class
 * Une class possède des propriétés (variables)
 * et des méthodes (fonctions)
 */
class MathOperation {

    function addition(... $num)
    {
        $total = 0;
        foreach ($num as $value) {
            $total += $value;
        }
        return $total;
    }

    function soustraction($numD, ... $num)
    {
        $total = $numD;
        foreach ($num as $value) {
            $total -= $value;
        }
        return $total;
    }

    function multiplication ($num1, $num2)
    {
        return $num1 * $num2;
    }

    function division ($num1, $num2)
    {
        return $num1 / $num2;
    }
}