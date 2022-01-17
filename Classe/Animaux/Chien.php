<?php
require_once "Mammifere.php";

/**
 * Une class peut extends d'une autre class. On appelle ça l'héritage
 * Dans ce cas Chien est une class enfant de Mammifere
 * et Mammifere est une class parent.
 * 
 * Les class enfant héritent des propriétés et méthodes du parent
 */
class Chien extends Mammifere
{
    /**
     * Affiche le cri du chien
     *
     * @return string
     */
    public function cri(): string
    {
        return "Ouaf!";
    }

    public function getType(): string
    {
        return $this->type;
    }

    public static function getEspece (): string
    {
        // parent:: permet de faire référence à la class parent pour récupérer
        // les constantes ou éléments static
        return parent::ESPECE;
    }
}
