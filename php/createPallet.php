<?php
session_start();

if (isset($_POST["cookie"]) && isset($_POST["numberOfPallets"])) {
	require_once('database.php');

	$cookie = $_POST['cookie'];
	$numberOfPallets = $_POST['numberOfPallets'];

	$database = new Database();
	$blocked = 0;

	for($i = 0; $i < $numberOfPallets; $i++) {
		$sql = "INSERT INTO pallets(blocked, cookie) VALUES(?,?)";
		$database->executeQuery($sql, array($blocked, $cookie));  
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
