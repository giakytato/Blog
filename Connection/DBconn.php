<?php
include __DIR__ . '/DB.php';

class DatabaseConnection {

	public function __construct() {
		$conn = new mysqli(DB::DBHOST, DB::DBUSER, DB::DBPASS, DB::DBNAME);

		if ($conn->connect_error) {
			die('Connessione al DB Fallita');
		}

		// echo 'Connessione riuscita';
		return $this->conn = $conn;
	}
}

 //$conn_test = new DatabaseConnection();
 //$conn_test = $this->conn;

?>