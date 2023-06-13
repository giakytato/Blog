<?php

class ModelCategory {
	public function __construct() {
		$db = new DatabaseConnection();
		$this->conn = $db->conn;
	}

	public function create($inputData) {
		$category_name = $inputData['category_name'];
		

		$categoryQuery = "INSERT INTO category (category_name) VALUES ('$category_name')";

		$result = $this->conn->query($categoryQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function index() {
		$categoryQuery = "SELECT * FROM category";
		$result = $this->conn->query($categoryQuery);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function edit($id) {
		$category_id = $id;
		$categoryQuery = "SELECT * FROM category WHERE id='$category_id' LIMIT 1";
		$result = $this->conn->query($categoryQuery);
		if ($result->num_rows == 1) {
			$data = $result->fetch_assoc();
			return $data;
		} else {
			return false;
		}
	}

	public function update($inputData, $id) {
		$category_id = $id;
	    $category_name = $inputData['category_name'];
		

		$categoryQuery = "UPDATE category SET category_name='$category_name' WHERE id='$category_id' LIMIT 1";

		$result = $this->conn->query($categoryQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id) {
		$category_id = $id;
		$categoryDeleteQuery = "DELETE FROM category WHERE id='$category_id' LIMIT 1";
		$result = $this->conn->query($categoryDeleteQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

}
?>