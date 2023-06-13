<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_commenti.php';

$db = new DatabaseConnection();

if (isset($_POST['update_commenti'])) {

	$id = mysqli_real_escape_string($db->conn, $_POST['commentiID']);

	$visibility = $_POST['active'];
    $active = 0;
    
    if($visibility == 1){
        $active = 1;
    }

	$inputData = [
		'titolo' => mysqli_real_escape_string($db->conn, $_POST['titolo']),
		'testo' => mysqli_real_escape_string($db->conn, $_POST['testo']),
		'reate' => $_POST['reate'],
        'active' => $active,
		'id_article' => $_POST['id_article'],
		
	];
	// $id = 3;

	// $inputData = [
    //     'titolo' => 'titolo test',
	// 	'testo' => 'testo test',
	// 	'reate' => 5,
	// 	'active' => 1,
    //     'id_article' => 9,

    // ];


	
	$commenti = new Model_commenti();
	$result = $commenti->update($inputData, $id);

	if ($result) {
		$_SESSION['message'] = 'commento' . $inputData['titolo'] . 'aggiornato con successo';
		header("Location: ../View/commenti_view.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'commento non modificato';
		header("Location: ../View/commenti_view.php");
		exit(0);
	}
}
