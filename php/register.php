<?php
session_start();

require_once('database.php');

if (isset($_POST['username'])
	&& isset($_POST['password'])
	&& isset($_POST['rep_password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rep_password = $_POST['rep_password'];

	$database = new Database();
	$query = 'SELECT username FROM users WHERE username = ?';
	$database->executeQuery($query, array($username));

	$response = [];
	if ($query) {
		if ($password == $rep_password) {
			$query = 'INSERT INTO users VALUES(?, ?, ?)';
			$salt = mcrypt_create_iv(12);
			$password = $database->passwordHash($password, $salt);
			$database->executeQuery($query, array($username, $password, $salt));
			$response['error'] = false;
		} else {
			$response = [
				'error' => true,
				'msg' => 'Passwords must be equal.'
			];
		}
	} else {
		$response = [
			'error' =>true,
			'msg' => 'Username is already taken.'
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
