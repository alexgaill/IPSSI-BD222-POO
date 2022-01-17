<?php

class Chien
{

    /**
     * Nom du chien
     *  Commentaire pour php <7.4
     * @var string
     */
    private $nom;

    /**
     * Couleur du chien
     *
     * @var string
     */
    private string $couleur;

    /**
     * Race du chien
     *
     * @var string
     */
    private string $race;

    /**
     * Age du chien
     *
     * @var integer
     */
    private int $age;

    /**
     * construct est une méthode mégaique qui intervient 
     * à la création d'un objet
     * Il permet ainsi par exemple passer des des valeurs aux propriétés
     *
     * @param string $nom Nom de l'animal
     * @param string $couleur Couleur de l'animal
     * @param string $race Race de l'animal
     * @link http://url.com
     * @param integer $age Age de l'animal
     */
    public function __construct(string $nom, string $couleur, string $race, int $age)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->race = $race;
        $this->age = $age;
    }

    /**
     * Affiche le cri du chien
     *
     * @return string
     */
    public function cri(): string
    {
        return "Ouaf!";
    }

    /**
     * Cette méthode est un getter ou un accesseur
     * Elle permet de retourner l'information d'une propriété privée
     *
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Cette méthode est un setter ou un mutateur
     * Elle permet de définir ou de modifier la valeur d'une propriété
     * @param string $nom
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
}
