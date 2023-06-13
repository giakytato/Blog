<?php
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_users_blog.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST_BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Edit</h4>
                    </div>
                    <div class="card-body">

                    <?php
if (isset($_GET['id'])) {
	$users_id = $_GET['id'];
	$users = new Model_users_blog();
	$result = $users->edit($users_id);

	if ($result) {
		?>
                        <form action="../Controller/Controller_update_users_blog.php" method="POST">
                            <input type="hidden" name="users_id" value="<?php echo $result['id']; ?>">

                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input type="text" name="full_name" required class="form-control" value="<?php echo $result['full_name']; ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" required class="form-control" value=<?php echo $result['email']; ?> />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_users" class="btn btn-primary">update user</button>
                            </div>
                        </form>
                        <?php
} else {
		echo "<h4>No Record Found</h4>";
	}
} else {
	echo "<h4>Something Went Wront</h4>";
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>