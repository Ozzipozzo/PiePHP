<?php
namespace Core;
use \PDO;

class Database {

    private $dbh;

    public function __construct($dbname, $login, $password, $host = 'localhost') {
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$dbname;" . 'charset=utf8', $login, $password);
        } catch (\Exception $e) {
            die("La connexion est impossible, veuillez contacter votre admin");
        }
    }

    public function getDB() {
        if ($this->dbh instanceof PDO){
            return $this->dbh;
        }
    }

}