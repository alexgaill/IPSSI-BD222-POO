<?php
namespace Core\Database;

/**
 * Initialise la connexion à la base de donnée.
 * La connexion est récupérable sur la propriété $pdo
 * Une classe est abstract quand elle possède des méthodes abstract
 * Une méthode abstract est une méthode que l'on doit implémenter chez tous les enfants de la class abstract.
 * On n'est pas obligé de leurt définir un fonctionnement mais ells doivent être implémentée.
 * 
 * Rendre une class abstract permet de dire aux développeurs que l'on attend un certain fonctionnement
 * et une certaine utilisation de la class parent produite
 */
abstract class Database{

    /**
     * @var string
     */
    private string $host;

    /**
     * @var string
     */
    private string $dbname;

    /**
     * @var string
     */
    private string $user;

    /**
     * @var string
     */
    private string $pass;

    /**
     * @var \PDO|null
     */
    protected \PDO|null $pdo;

    /**
     * Charge la connexion à la BDD à l'instanciation de la class
     */
    public function __construct()
    {
        $this->getConfig();
        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    /**
     * Hydrate les propriétés de connexion à partir du fichier dbConfig
     */
    private function getConfig ()
    {
        require ROOT ."/config/dbConfig.php";
        
        // $this->host = $config["host"];
        // $this->dbname = $config["dbname"];
        // $this->user = $config["user"];
        // $this->pass = $config["pass"];
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Doit retourner l'ensemble des données d'une table
     *
     * @return array|boolean
     */
    abstract function findAll(): array|bool;

    /**
     * Doit retourner un élément d'une table en fonction de son id
     *
     * @param integer $id
     * @return object|boolean
     */
    abstract function find(int $id): object|bool;

    /**
     * Doit retourner un tableau d'éléments d'une table 
     * en fonction de critères passés en tableau
     *
     * @param array $criteria
     * @return array|boolean
     */
    abstract function findBy(array $criteria): array|bool;

    /**
     * Doit retourner un élément d'une table 
     * en fonction de critères passés en tableau
     *
     * @param array $criteria
     * @return object|boolean
     */
    abstract function findOneBy(array $criteria): object|bool;
}