<?php
namespace Classe;

/**
 * Une class est un modèle ou une représentation d'objets que nous pouvons créer.
 * Une class contient des propriétés (variables) et des méthodes (fonctions).
 */
class Revision {

    /**
     * Les propriétés et les méthodes ont une visibilité ou une portée d'utilisation.
     * Il en existe 3:
     * Public: l'élément est accessible partout dans le code
     * Private: l'élément est accessible uniquement dans la classe dans laquelle il est déclaré
     * Protected: l'élément est accessible dans la classe dans laquelle il est déclaré et dans les class enfants
     */

     /**
      * @var integer
      */
    public int $prop1;

    /**
     * @var array
     */
    private array $prop2;

    /**
     * @var string
     */
    private string $prop3 = "test";

    /**
     * @var string
     */
    protected string $protec;

    /**
     * @var integer
     * @static
     */
    protected static int $stat = 4;

    /**
     * __construct est une méthode magique appelée à l'instanciation d'une class.
     * Elle exécute automatiquement le code présent à l'intérieur.
     * Généralement, on s'en sert pour attribuer des valeurs aux propriétés de la classe.
     * Depuis php8, on peut déclarer directement les propriétés dans les paramètres du constructeur.
     */
    public function __construct(private string $prop4)
    {
        var_dump($this);
    }

    /**
     * @return string
     */
    public function method1(): string
    {
        return "Hello";
    }

    /**
     * @param integer $nb1
     * @param integer $nb2
     * @return integer
     */
    private function param1(int $nb1, int $nb2): int
    {
        return $nb1 + $nb2;
    }

    /**
     * getProp2 est un getter ou accesseur qui permet d'accéder à la propriété prop2 qui est private
     * $this->fait référence à l'objet et permet de récupérer la valeur prop2 de l'objet instancié
     *
     * @return array
     */
    public function getProp2(): array
    {
        return $this->prop2;
    }

    /**
     * setProp2 est un setter ou mutateur qui permet de modifier la valeur de la propriété prop2 qui est private
     *
     * @param array $prop
     * @return void
     */
    public function setProp2(array $prop)
    {
        $this->prop2 = $prop;
    }
}

/**
 * Pour créer un objet et l'utiliser, on instancie la class à l'aide de new Class() et on lui passe les paramètres nécessaires au constructeur dans les ()
 */
$rev = new Revision("prop4");
// On récupère la valeur d'une propriété
$rev->prop1;
// On récupère le résultat d'une méthode
$rev->getProp2();

/**
 * Revision2 est un enfant de Revision
 * On parle d'héritage
 * Revision2 accède ainsi aux propriétés et méthodes de révision et peut les utiliser excepté les éléments private
 */
class Revision2 extends Revision{

    /**
     * Une classe peut posséder des constantes. Celles-ci ont une visibilité.
     * Une constante est accessible à partir de la class et non de l'objet
     */
    public const CONSTANTE = "constante";

    /**
     * Certains éléments sont static. Cela signifie qu'ils appartiennent à la class et non à l'objet.
     * Ces éléments sont des propriétés et des méthodes. Ils bénéficient de la visibilité.
     *
     * @var integer
     */
    public static int $statProp = 12;

    /**
     * La propriété protec est protected. Elle est donc accessible dans la class où elle est déclarée et dans les class enfants.
     * On peut donc créer si on le souhaite un getter pour cette propriété dans un enfant.
     * @return string
     */
    public function getProtec(): string
    {
        return $this->protec;
    }

    public static function getAllStatic() :int
    {
        /**
         * Pour récupérer une élément static, on fait référence à la class qui le possède 
         * puis on utilise l'opérateur de résolution de portée "::".
         * 
         * Pour récupérer du parent, on fait directement référence au parent avec "parent::"
         * Pour récupérer un élément de la class, on fait directement référence à celle-ci avec "self::"
         */
        return parent::$stat + self::$statProp;
    }
}
/**
 * Les constantes, les éléments static et ne nom de la class sont récupérable sans avoir à instancier un objet.
 * Pour faire référence à la class, on utilise l'opérateur de résolution de portée "::" après le nom de la class en question
 * et on appelle l'élément dont on a besoin.
 * Attention: Ces éléments appartiennent à la classe et non aux objets!
 */
Revision2::class;
Revision2::CONSTANTE;
Revision2::$statProp;
Revision2::getAllStatic();