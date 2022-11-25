<?php
namespace App\db;

class DatabaseConnection
{
    public ?\PDO $database = null;
    

    public function getConnection(): \PDO
    {
        if($this->database === null) {
            $this->database = new \PDO('mysql:host=;dbname=blog;charset=utf8', 'root', '');
        }
        return $this->database;
    }

}
