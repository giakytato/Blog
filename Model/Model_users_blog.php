<?php

class Model_users_blog {
	public function __construct() {
		$db = new DatabaseConnection();
		$this->conn = $db->conn;
	}

	public function create($inputData) {
		$users_blog_full_name = $inputData['full_name'];
        $users_blog_email = $inputData['email'];

		

		$users_blog_Query = "INSERT INTO users_blog (full_name, email) VALUES ('$users_blog_full_name', '$users_blog_email')";
        

		$result = $this->conn->query($users_blog_Query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function index() {
		$users_blog_Query = "SELECT * FROM users_blog";
		$result = $this->conn->query($users_blog_Query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function edit($id) {
		$users_blog_id = $id;
		$users_blog_Query = "SELECT * FROM users_blog WHERE id='$users_blog_id' LIMIT 1";
		$result = $this->conn->query($users_blog_Query);
		if ($result->num_rows == 1) {
			$data = $result->fetch_assoc();
			return $data;
		} else {
			return false;
		}
	}

	public function update($inputData, $id) {
		$users_blog_id = $id;
	    $users_blog_full_name = $inputData['full_name'];
        $users_blog_email = $inputData['email'];
		

		$users_blog_Query = "UPDATE users_blog SET full_name='$users_blog_full_name', email='$users_blog_email' WHERE id='$users_blog_id' LIMIT 1";

		$result = $this->conn->query($users_blog_Query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id) {
		$users_blog_id = $id;
		$users_blog_Query = "DELETE FROM users_blog WHERE id='$users_blog_id' LIMIT 1";
		$result = $this->conn->query($users_blog_Query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

}
?>