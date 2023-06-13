<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';

$db = new DatabaseConnection();

if (isset($_POST['save_category'])) {

	$inputData = [
		'category_name' => mysqli_real_escape_string($db->conn, $_POST['category_name']),
		
	];

	$category = new ModelCategory();
	$result = $category->create($inputData);

	if ($result) {
		$_SESSION['message'] = 'Category aggiunto con successo';
		header("Location: ../View/category_add.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'Category non inserito';
		header("Location: ../View/category_add.php");
		exit(0);
	}

}

?>