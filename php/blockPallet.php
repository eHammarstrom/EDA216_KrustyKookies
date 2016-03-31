<?php
session_start();

if (isset($_POST["cookie"]) && isset($_POST["startDate"]) && isset($_POST["endDate"])) {
	require_once('database.php');

	$cookie = $_POST['cookie'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];

	$database = new Database();

	if($startDate > $endDate) {
		$response = [
			'error' => true,
			'msg' => 'startDate > endDate.'
		];
	} else {
		
		$rows = $database->blockPallets($startDate, $endDate, $cookie);

		$response = [
			'error' => false,
			'msg' => 'Success. '.$rows.' row(s) blocked.'
		];     
	}          

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
