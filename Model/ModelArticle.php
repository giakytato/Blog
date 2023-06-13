<?php

class ModelArticle {
	public function __construct() {
		$db = new DatabaseConnection();
		$this->conn = $db->conn;
	}

	public function create($inputData) {
		$article_title = $inputData['title'];
        $article_sub_title = $inputData['sub_title'];
        $article_art_text = $inputData['art_text'];
        $article_id_category = $inputData['id_category'];
		

		$articleQuery = "INSERT INTO article (title, sub_title, art_text, id_category) VALUES ('$article_title', '$article_sub_title', '$article_art_text', '$article_id_category')";

		$result = $this->conn->query($articleQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function index() {
		$articleQuery = "SELECT * FROM article";
		$result = $this->conn->query($articleQuery);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function edit($id) {
		$article_id = $id;
		$articleQuery = "SELECT * FROM article WHERE id='$article_id' LIMIT 1";
		$result = $this->conn->query($articleQuery);
		if ($result->num_rows == 1) {
			$data = $result->fetch_assoc();
			return $data;
		} else {
			return false;
		}
	}

	public function update($inputData, $id) {
		$article_id = $id;
        $article_title = $inputData['title'];
        $article_sub_title = $inputData['sub_title'];
        $article_art_text = $inputData['art_text'];
        $article_id_category = $inputData['id_category'];
		

		$articleQuery = "UPDATE article SET title='$article_title', sub_title='$article_sub_title', art_text='$article_art_text', id_category='$article_id_category' WHERE id='$article_id' LIMIT 1";

		$result = $this->conn->query($articleQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id) {
		$article_id = $id;
		$articleDeleteQuery = "DELETE FROM article WHERE id='$article_id' LIMIT 1";
		$result = $this->conn->query($articleDeleteQuery);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

}
?>