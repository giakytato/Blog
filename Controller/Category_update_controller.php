<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';

$db = new DatabaseConnection();

if (isset($_POST['update_category'])) {

	$id = mysqli_real_escape_string($db->conn, $_POST['category_id']);

	$inputData = [
		'category_name' => mysqli_real_escape_string($db->conn, $_POST['category_name']),
    ];
		

	$category = new ModelCategory();
	$result = $category->update($inputData, $id);

	if ($result) {
		$_SESSION['message'] = 'category ' . $inputData['category_name'] . ' aggiornato con successo';
		header("Location: ../View/category_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'categoia non modificato';
		header("Location: ../View/category_view.php");
		exit(0);
	}

}
