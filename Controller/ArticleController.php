<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelArticle.php';

$db = new DatabaseConnection();

if (isset($_POST['save_article'])) {

	$inputData = [
		'title' => mysqli_real_escape_string($db->conn, $_POST['title']),
		'sub_title' => mysqli_real_escape_string($db->conn, $_POST['sub_title']),
		'art_text' => mysqli_real_escape_string($db->conn, $_POST['art_text']),
		'id_category' => mysqli_real_escape_string($db->conn, $_POST['id_category']),
		
	];

	$article = new ModelArticle();
	$result = $article->create($inputData);

	if ($result) {
		$_SESSION['message'] = 'Articolo aggiunto con successo';
		header("Location: ../View/article_add.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'Articolo non inserito';
		header("Location: ../View/article_add.php");
		exit(0);
	}

}

?>