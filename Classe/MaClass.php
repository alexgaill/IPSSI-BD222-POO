<?php

class MaClass {

    // Une class possède des propriétés et des méthodes

    /**
     * Les propriétés et les méthodes possèdent une visibilité
     * Elle représente la portée d'utilisation de ces éléments
     * 3 valeurs:
     * 
     * public: Elle permet d'utiliser l'élément partout dans le code
     * private: Limite l'utilisation de l'élément à la classe 
     *          dans laquelle il est déclaré
     * protected: 
     * 
     * Définir la visibilité de nos éléments s'appelle l'encapsulation
     */

    private $prop1 = 12;
    public $prop2 = "coucou";
    public $prop3;

    public function methode()
    {
        return true;
    }

    public function methodeWithParam($param)
    {
        return $param . " World!";
    }

    public function methodeWithDefault($param = "Hello")
    {
        return $param . " World!";
    }

    public function getProp1 ()
    {
        // $this-> fait référence à l'objet créé à partir de la class 
        // et permet d'utiliser les propriétés et les méthodes
        // de cet objet
        return $this->prop1;
    }
}