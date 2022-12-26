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
        include 'dbConfig.php';
        if ($this->database === null) {
            $this->database = new \PDO(
                "mysql:host = DB_HOST;dbname = DB_NAME;charset=UTF8",
                DB_USER, DB_PASSWORD
            );
        }
        return $this->database;
    }


}
