<?php
session_start();

include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelArticle.php';

$db = new DatabaseConnection();

if (isset($_POST['deleteArticle'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['deleteArticle']);

	$article = new ModelArticle();
	$result = $article->delete($id);
	if ($result) {
		$_SESSION['message'] = "articolo cancellato con successo";
		header("Location: ../View/article_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = "articolo non cacellato";
		header("Location: ../View/article_view.php");
		exit(0);
	}
}
?>