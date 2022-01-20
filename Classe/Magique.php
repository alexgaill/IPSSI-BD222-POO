<?php
namespace Classe;

class Magique {
    
    public array $data = [];

    private string $privateProp = "World";

    protected string $protectedProp;

    /**
     * Activée lors de l'instanciation d'une class
     */
    public function __construct()
    {
        echo 'La class est instanciée';
        echo "<br>";
    }

    /**
     * Activée lorsque l'objet n'est plus utilisé
     */
    public function __destruct()
    {
        echo "L'objet n'est plus utilisée";
        echo "<br>";
    }

    /**
     * Activée lorsqu'on tente d'appeler une méthode qui est inexistante, protected ou private
     *
     * @param string $name Nom de la méthode non appellable
     * @param array $arguments paramètres passés lors de l'appel de la méthode
     * @return void
     */
    public function __call(string $name, array $arguments)
    {
        echo "La méthode $name est inexistante, protected ou private mais je fais un dump des arguments";
        echo "<br>";
        var_dump($arguments);
        echo "<br>";
    }

    private function privateMet(){echo "coucou";}
    protected function protectedMet(){}

    /**
     * Activée lorsqu'on tente d'appeler une méthode static qui est inexistante, protected ou private
     * __callStatic doit obligatoirement être définie en static
     * @param string $name Nom de la méthode non appellable
     * @param array $arguments paramètres passés lors de l'appel de la méthode
     * @return void
     */
    public static function __callStatic(string $name, array $arguments)
    {
        echo "La méthode static $name est inexistante, protected ou private mais je fais un dump des arguments";
        echo "<br>";
        var_dump($arguments);
        echo "<br>";
    }

    private static function privateStatMet(){}
    protected static function protectedStatMet(){}

    /**
     * Activée lorsqu'on tente de modifier la valeur d'une propriété inexistante, protected ou private
     * Généralement, lorsqu'on définit cette méthode, on définit une propriété contenant un tableau de surcharge
     * On stocke les éléments dans ce tableau
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, mixed $value)
    {
        echo "La propriété $name est inexistante, protected ou private. Je stocke l'information dans le tableau de surcharge \$data";
        $this->data[$name] = $value;
        echo "<br>";
    }

    /**
     * Activée lorsqu'on tente de récupérer la valeur d'une propriété inexistante, protected ou private
     * Généralement, on essaye de récupérer la valeur dans le tableau de surcharge
     *
     * @param string $name
     * @return void
     */
    public function __get(string $name)
    {
        echo "La propriété $name est inexistante, protected ou private. Je regarde si j'ai l'information dans le tableau de surcharge \$data";
        echo "<br>";
        if (isset($this->data[$name])) {
            echo "T'as de la chance j'ai quelque chose:";
            echo "<br>";
            echo $this->data[$name];
        } else {
            echo "Je ne trouve aucune info";
        }
        echo "<br>";
    }

    /**
     * Activée, lorsqu'on veut vérifier si une propriété inexistante, private ou protected existe
     *
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        echo "La propriété est inaccessible ou inexistante je regarde si elle est dans le tableau de surcharge";
        echo "<br>";
        if (isset($this->data["$name"])) {
            echo "La propriété est dans la surcharge";
            echo "<br>";
            return true;
        } else {
            echo "La propriété n'est nulle part";
            echo "<br>";
            return false;
        }
    }
    
    /**
     * Activée, lorsqu'on veut supprimer une propriété inexistante, private ou protected existe
     *
     * @param string $name
     */
    public function __unset(string $name)
    {
        echo "La propriété est inaccessible ou inexistante je regarde si elle est dans le tableau de surcharge pour la supprimer";
        echo "<br>";
        if (isset($this->data["$name"])) {
            echo "La propriété est dans la surcharge, je la supprime";
            echo "<br>";
            unset($this->data["$name"]);
        } else {
            echo "La propriété n'est nulle part";
            echo "<br>";
        }
    }

    /**
     * Activée lorsqu'on utilise la fonction serialize().
     * elle permet de nettoyer les données et de définir les données de l'objet qui seront linéarisées.
     * Les propriétés que l'on peut définir dans le tableau sont les propriétés public, private et protected de la class
     * ainsi que les propriétés public et protected du parent
     *
     * @return array
     */
    public function __sleep(): array
    {
        return ["data"];        
    }

    /**
     * Activée lorsqu'on utilise la fonction serialize().
     * elle permet de nettoyer les données et de définir les données de l'objet qui seront linéarisées.
     * Les propriétés que l'on peut définir dans le tableau sont les mémes que pour __sleep
     * mais on peut également ajouter les propriétés private du parent.
     * 
     * Si on définit __sleep et __serialize dans une class, __serialize va écraser le fonctionnement de __sleep
     * 
     * @return array
     */
    public function __serialize(): array
    {
        return [
            "data" => $this->data, 
            "privateProp" => $this->privateProp
        ];  
    }

    /**
     * Activée lorsqu'on utilise la fonction unserialize().
     * Elle permet de relancer certains fonctionnement dans l'objet nécessaire avant de déserializer
     */
    public function __wakeup()
    {

    }

    public function seeDeserialize(Magique $data) {
        var_dump($data);
    }

    /**
     * Activée lorsqu'on utilise la fonction unserialize().
     * Elle permet de relancer certains fonctionnement dans l'objet nécessaire avant de déserializer.
     * 
     * __unserialize écrase le fonctionnement de __wakeup si les 2 sont définis
     */
    public function __unserialize(array $data): void
    {
        var_dump($data);
    }

    /**
     * Activée lorsqu'on veut faire un echo de l'objet
     * Cette fonction doit obligatoirement retourner une string
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Je suis un objet pas une chaine de caratères...";
    }

    /**
     * Activée lorsqu'on veut utiliser l'objet comme une fonction
     *
     * @return string
     */
    public function __invoke():string
    {
        return "Je suis un objet, pas une fonction...";
    }

    /**
     * Activée lorsqu'on utilise la fonction var_export
     * Cette méthode doit obligatoirement être static
     *
     * @param [type] $properties
     * @return void
     */
    public static function __set_state($properties)
    {

        // $mag = new Magique;
        // $mag->data = $properties;
        $properties[] = "coucou";
        return $properties;
        // return $mag;
    }

    /**
     * Activée lorsqu'on utilise la fonction var_dump()
     * Cette méthode doit obligatoirement retourner un tableau
     *
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            $this->data
        ];
    }


}