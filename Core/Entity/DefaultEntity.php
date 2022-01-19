<?php
namespace Core\Entity;

class DefaultEntity {

    /**
     * A l'instanciation d'une entité, on appelle la méthode hydrate
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

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