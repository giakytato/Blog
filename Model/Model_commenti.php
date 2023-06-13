<?php

class Model_commenti {
	public function __construct() {
		$db = new DatabaseConnection();
		$this->conn = $db->conn;
	}

	public function create($inputData) {
		$commenti_titolo = $inputData['titolo'];
        $commenti_testo = $inputData['testo'];
		$commenti_reate = $inputData['reate'];
		$commenti_active = $inputData['active'];
        $commenti_id_article = $inputData['id_article'];
		$update = $update ['update'];

		$commentiQuery = "INSERT INTO commenti (titolo, testo, reate, active, id_article, update) VALUES ('$commenti_titolo', '$commenti_testo','$commenti_reate', '$commenti_active', '$commenti_id_article', '$update')";

		$result = $this->conn->query($commentiQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function index() {
		$commentiQuery = "SELECT * FROM commenti";
		$result = $this->conn->query($commentiQuery);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function edit($id) {
		$commenti_id = $id;
		$commentiQuery = "SELECT * FROM commenti WHERE id='$commenti_id' LIMIT 1";
		$result = $this->conn->query($commentiQuery);
		if ($result->num_rows == 1) {
			$data = $result->fetch_assoc();
			return $data;
		} else {
			return false;
		}
	}

	public function update($inputData, $id) {
		$commenti_id = $id;
        $commenti_titolo = $inputData['titolo'];
        $commenti_testo = $inputData['testo'];
		$commenti_reate = $inputData['reate'];
        $commenti_active = $inputData['active'];
        $commenti_id_article = $inputData['id_article'];
		$update = $update ['update'];


		// $commenti_id = $id;
        // $commenti_titolo = 'titolo testo';
        // $commenti_testo = 'testo testo';
		// $commenti_reate = 5;
        // $commenti_active = 1;
        // $commenti_id_article = 9;


		$commentiQuery = "UPDATE commenti SET tiolo='$commenti_titolo', testo='$commenti_testo', reate='$commenti_reate', active='$commenti_active', id_article='$commenti_id_article' WHERE id='$commenti_id' LIMIT 1";

		$result = $this->conn->query($commentiQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id) {
		$commenti_id = $id;
		$commentiDeleteQuery = "DELETE FROM commenti WHERE id='$commenti_id' LIMIT 1";
		$result = $this->conn->query($commentiDeleteQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

}
?>