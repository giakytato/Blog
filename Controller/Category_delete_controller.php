<?php
session_start();

include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';

$db = new DatabaseConnection();

if (isset($_POST['deleteCategory'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['deleteCategory']);

	$category = new ModelCategory();
	$result = $category->delete($id);
	if ($result) {
		$_SESSION['message'] = "categoria cancellato con successo";
		header("Location: ../View/category_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = "categoria non cacellato";
		header("Location: ../View/category_view.php");
		exit(0);
	}
}
?>