<?php

class Database {
	private $_host;
	private $_username;
	private $_password;
	private $_database;
	private $conn;

	public function __construct() {
		require('connect_data.php');
		$this->_host = $_host;
		$this->_username = $_username;
		$this->_password = $_password;
		$this->_database = $_database;
	}

	private function getConnection() {
		if (!isset($this->conn)) {
			try {
				$this->conn = new PDO("mysql:host=$this->_host;dbname=$this->_database",
					$this->_username, $this->_password);
			} catch (PDOException $e) {
				header('location: ../connectionerror.html');
			}
		}
		return $this->conn;
	}

	public function executeQuery($query, $param = null) {
		$result = false;
		try {
			$stmt = $this->getConnection()->prepare($query);
			$stmt->execute($param);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "\n query: " . $query;
			die($error);
		}
		return $result;
	}
    
    private function executeUpdate($query, $param = null) {
		try {
			$stmt = $this->conn->prepare($query);
  			$stmt->execute($param);
  			$rows = $stmt->rowCount();
  		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "<p>" . $query;
			die($error);
		}
		return $rows;
	}

	public function passwordHash($password, $salt) {
		return hash("SHA512", $salt . $password);
	}
    
    public function getPallets() {
        $sql="SELECT * FROM pallets";
        $result = $this->executeQuery($sql);
        
        foreach($result as $res) {
            $pallets["barcode"] = $res["barcode"];
            $pallets["blocked"] = $res["blocked"];
            $pallets["dateCreated"] = $res["dateCreated"];
            $pallets["cookie"] = $res["cookie"];
        }
        
        return pallets;
	}
    
    public function createPallets($cookie) {
        
        $blocked = 0;
        $dateCreated = "2016-03-01";

        $sql = "INSERT INTO pallets(blocked, dateCreated, cookie) VALUES(?,?,?)";
        $result = $this->executeUpdate($sql, array($blocked, $dateCreated, $cookie));

    }
}

?>
