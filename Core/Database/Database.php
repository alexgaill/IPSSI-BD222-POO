<?php
namespace Core\Database;

/**
 * Initialise la connexion à la base de donnée.
 * La connexion est récupérable sur la propriété $pdo
 */
class Database{

    private string $host;

    private string $user;

    private string $pass;

    public \PDO|null $pdo;

    public function __construct()
    {
        $this->getConfig();
        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

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