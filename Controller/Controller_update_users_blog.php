<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_users_blog.php';

$db = new DatabaseConnection();

if (isset($_POST['update_users'])) {

	$id = mysqli_real_escape_string($db->conn, $_POST['users_id']);

	$inputData = [
		'full_name' => mysqli_real_escape_string($db->conn, $_POST['full_name']),
        'email' => mysqli_real_escape_string($db->conn, $_POST['email']),
    ];
		

	$users = new Model_users_blog();
	$result = $users->update($inputData, $id);

	if ($result) {
		$_SESSION['message'] = 'users ' . $inputData['full_name'] . ' aggiornato con successo';
		header("Location: ../View/users_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'categoia non modificato';
		header("Location: ../View/users_view.php");
		exit(0);
	}

}


