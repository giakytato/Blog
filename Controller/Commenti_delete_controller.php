<?php
session_start();

include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_commenti.php';

$db = new DatabaseConnection();

if (isset($_POST['deleteCommenti'])) {
	$id = mysqli_real_escape_string($db->conn, $_POST['deleteCommenti']);

	$commenti = new Model_commenti();
	$result = $commenti->delete($id);
	if ($result) {
		$_SESSION['message'] = "commento cancellato con successo";
		header("Location: ../View/commenti_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = "commento non cacellato";
		header("Location: ../View/commenti_view.php");
		exit(0);
	}
}
?>
