<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_users_blog.php';

$db = new DatabaseConnection();

if (isset($_POST['save_users'])) {

	$inputData = [
		'full_name' => mysqli_real_escape_string($db->conn, $_POST['full_name']),
        'email' => mysqli_real_escape_string($db->conn, $_POST['email']),

	];

	$users = new Model_users_blog();
	$result = $users->create($inputData);

	if ($result) {
		$_SESSION['message'] = 'Utente aggiunto con successo';
		header("Location: ../View/users_add.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'Utente non inserito';
		header("Location: ../View/users_add.php");
		exit(0);
	}

}

?>