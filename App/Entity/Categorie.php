<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class Categorie extends DefaultEntity{

    /**
     * Id de la catégorie
     *
     * @var integer
     */
    private int $id;

    /**
     * Nom de la catégorie
     *
     * @var string
     */
    private string $name;

    public function __invoke()
    {
        return [
            "name" => $this->name
        ];
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
