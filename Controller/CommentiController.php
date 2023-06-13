<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_commenti.php';

$db = new DatabaseConnection();

if (isset($_POST['save_comment'])) {

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

    // $inputData = [
	// 	'titolo' => 'titolo test',
	// 	'testo' => 'testo commento',
	// 	'reate' => 1,
    //     'active' => 0,
	// 	'id_article' => 6,
		
	// ];

	$commenti = new Model_commenti();
	$result = $commenti->create($inputData);

	if ($result) {
		$_SESSION['message'] = 'Commento aggiunto con successo';
		header("Location: ../View/commenti_add.php");
		exit(0);
	} else {
		$_SESSION['message'] = 'Commento non inserito';
		header("Location: ../View/commenti_add.php");
		exit(0);
	}

}

?>