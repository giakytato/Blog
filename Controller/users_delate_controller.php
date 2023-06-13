<?php
session_start();

include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_users_blog.php';

$db = new DatabaseConnection();

if (isset($_POST['delete_Users'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['delete_Users']);

	$user = new Model_users_blog();
	$result = $user->delete($id);
	if ($result) {
		$_SESSION['message'] = "user cancellato con successo";
		header("Location: ../View/users_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = "user non cacellato";
		header("Location: ../View/users_view.php");
		exit(0);
	}
}
?>