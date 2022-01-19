<?php
namespace Core\Entity;

class DefaultEntity {

    /**
     * A l'instanciation d'une entité, on appelle la méthode hydrate
     * Pour de l'hydration on doit passer mettre une valeur par défaut au paramètre data
     * afin d'éviter des erreurs lors de la récupération de données avec pdo
     * car le \PDO::FETCH_CLASS appelle le constructeur
     * 
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    /**
     * invoke est une méthode magique comme le constructeur
     * Elle permet de définir un script à exécuter lorsque l'objet est appelé comme une fonction
     *
     * @return void
     */
    public function __invoke(){}

    /**
     * L'hydratation est une technique permettant à partir d'un tableau de données généralement 
     * (ça peut également être à partir d'un objet ou d'un ensemble de paramètres)
     * de générer un objet lié à une entité avec les données passées
     *
     * @param array $data
     * @return void
     */
    private function hydrate (array $data)
    {
        // if (isset($data["name"])) {
        //     $this->name = $data["name"];
        // }

        foreach ($data as $key => $value) {
            $method = "set". ucfirst($key); // name => setName
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}