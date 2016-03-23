<?php
session_start();

require_once('database.php');


      if (isset($_POST["cookie"]) && isset($_POST["numberOfPallets"])) {
        $cookie = $_POST['cookie'];
        $numberOfPallets = $_POST['numberOfPallets'];

        $database = new Database();
          
          
        $blocked = 0;
        $dateCreated = "2016-03-01";
          
          for($i = 0; $i < $numberOfPallets; $i++) {
              $sql = "INSERT INTO pallets(blocked, dateCreated, cookie) VALUES(?,?,?)";
              $database->executeQuery($sql, array($blocked, $dateCreated, $cookie));  
          }
          
          $response = [
            'error' => false,
            'msg' => 'Success.'
		  ];
          
	   	header('Content-Type: application/json');
	    echo json_encode($response);  
      } else {
          $response = [
              'error' => true,
			 'msg' => 'FATAL ERROR.'
		  ];
          header('Content-Type: application/json');
	    echo json_encode($response);  
      }
      
?>