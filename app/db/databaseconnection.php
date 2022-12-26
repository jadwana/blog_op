<?php
namespace App\db;

/**
 * DatabaseConnection class
 * To connect to the data base
 */
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
        if ($this->database === null) {
            $this->database = new \PDO(
                "mysql:host=".$_ENV['DB_SERVER'].";dbname=".$_ENV['DB_NAME'].";charset=UTF8",
                $_ENV['DB_USER'], $_ENV['DB_PASS']
            );
        }
        return $this->database;
    }


}
