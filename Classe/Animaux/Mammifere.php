<?php
namespace Classe\Animaux;

class Mammifere
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

    protected string $type = "Mammifère";

    public const ESPECE = "Mammifère";

    public static $property = "Je suis une propriété static";
    
    private static $propertyPrivate = "Je suis une propriété static privée";

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

    // // Avec PHP 8, on peut déclarer les propriétés directement
    // // en paramètre du constructeur
    // public function __construct(
    //     private string $nom, 
    //     private string $couleur,
    //     private string $race,
    //     private int $age
    //     ){}

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
     * @return self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of couleur
     *
     * @return string
     */
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @param string $couleur
     *
     * @return self
     */
    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of race
     *
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @param string $race
     *
     * @return self
     */
    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of age
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param int $age
     *
     * @return self
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public static function getPropertyPrivate(): string
    {
        // self:: permet de faire référence à la class pour récupérer
        // les constantes ou éléments static
        return self::$propertyPrivate;
    }
}
