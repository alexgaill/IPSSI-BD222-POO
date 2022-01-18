<?php
namespace Core\Database;

/**
 * Initialise la connexion à la base de donnée.
 * La connexion est récupérable sur la propriété $pdo
 */
class Database{

    /**
     * @var string
     */
    private string $host;

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
    public \PDO|null $pdo;

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
}