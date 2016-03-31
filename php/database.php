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
    
    public function executeUpdate($query, $param = null) {
		try {
			$stmt = $this->getConnection()->prepare($query);
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
	
	/*Checks that there are enough ingredients to create one pallet of a cookie.
	  Returns the credentials of the ingredients for updating storage.
	  A pallet contains 5400 cookies which gives us the factor 54 for 100 cookie recipes.
	  */
	
	private function checkIngredients($cookie){
		$sql = "SELECT ingredientName, ingredientAmount, currentAmount FROM cookieingredients NATURAL JOIN ingredients WHERE cookieName = ? FOR UPDATE";
		$dbResult = $this->executeQuery($sql, array($cookie));
	
		foreach($dbResult as $row){
			if(($row['ingredientAmount']*54) > $row['currentAmount']){
				return -1;
			}
		}	
		return $dbResult;
	}

    public function createPallets($cookie) {
		$blocked = 0;

		$this->getConnection()->beginTransaction();
			
		$sql = "INSERT INTO pallets(blocked, cookie) VALUES(?,?)";
			
		/*Default dateCreated. Column left blank for default value.*/
		$result = $this->executeUpdate($sql, array($blocked, $cookie));
		
		$ingredientCheck = $this->checkIngredients($cookie);
		
		if($ingredientCheck < 0){	
				$this->getConnection()->rollBack();
				return false;
			}

		$this->getConnection()->commit();
		
		foreach($ingredientCheck as $credentials){
			$sql = "UPDATE ingredients SET currentAmount = (currentAmount - (?*54)) WHERE ingredientName = ?";
			$update = $this->executeUpdate($sql, array($credentials['ingredientAmount'], $credentials['ingredientName']));			
		}
		return true;
    }
}

?>
