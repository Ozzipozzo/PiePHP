<?php

namespace Core;

use \PDO;

class ORM {

    private $dbh;

    public function __construct() {
		try
		{
			$this->dbh = new \PDO('mysql:host=localhost;dbname=PiePHP;charset=utf8', 'root', 'abdelpci', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (PDOException $e)
		{
			die("Erreur !: " . $e->getMessage());
		}
	}


    public function create($table, $fields) 
    {
		$sql = "INSERT INTO $table (?)
                VALUES (?)";
        $this->dbh->query($sql, []);
    }

	public function read($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $entry = $this->dbh->query($sql, [$id])->fetchAll(\PDO::FETCH_ASSOC);
        return $entry;
    }

	public function find($table, $params = [
        'WHERE' => 1,
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''
    ]) {}
}




$test = new ORM;
var_dump($test);