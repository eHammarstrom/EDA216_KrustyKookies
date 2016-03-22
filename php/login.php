<?php
session_start();

require_once('database.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$isLogin = false;

	$database = new Database();

	$query = 'SELECT password, salt FROM users WHERE username = ?';
	$result = $database->executeQuery($query, array($username));

	$response = [];
	if ($result != false) {
		if ($database->passwordHash($password, $result['salt']) == $result['password']) {
			$response['error'] = false;
			$isLogin = true;
		}
	}

	if ($login == false) {
		$response = [
			'error' => true,
			'msg' => 'Invalid credentials.'
		];
	}

	header('Content-Type: application/json');
	echo json_encode($response);
} else {
	$response = [
		'error' => true,
		'msg' => 'Blank fields.'
	];

	header('Content-Type: application/json');
	echo json_encode($response);
}

?>
