<?php
namespace App\db;

class DatabaseConnection
{
    public ?\PDO $database = null;
    /**
     * Function to connect to the data base
     *
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        include 'config.php';
        if ($this->database === null) {
            $this->database = new \PDO(
                "mysql:host=$servername;dbname=$dbname;charset=UTF8",
                $username, $password
            );
        }
        return $this->database;
    }
}
