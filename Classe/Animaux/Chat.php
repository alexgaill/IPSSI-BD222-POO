<?php

class Chat {

    // private string $nom;

    // private string $couleur;

    // private string $race;

    // private int $age;

    // Avec PHP 8, on peut déclarer les propriétés directement
    // en paramètre du constructeur
    public function __construct(
        private string $nom, 
        private string $couleur,
        private string $race,
        private int $age
        ){}

        public function cri(): string
        {
            return "Miaou!";
        }

        /**
         * Get the value of nom
         */
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         */
        public function setNom($nom): self
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of couleur
         */
        public function getCouleur()
        {
                return $this->couleur;
        }

        /**
         * Set the value of couleur
         */
        public function setCouleur($couleur): self
        {
                $this->couleur = $couleur;

                return $this;
        }

        /**
         * Get the value of race
         */
        public function getRace()
        {
                return $this->race;
        }

        /**
         * Set the value of race
         */
        public function setRace($race): self
        {
                $this->race = $race;

                return $this;
        }

        /**
         * Get the value of age
         */
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Set the value of age
         */
        public function setAge($age): self
        {
                $this->age = $age;

                return $this;
        }
}