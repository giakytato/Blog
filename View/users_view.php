<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/Model_users_blog.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS - Fetch Data from database in php mysql using oops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
if (isset($_SESSION['message'])) {
	echo "<h5>" . $_SESSION['message'] . "</h5>";
	unset($_SESSION['message']);
}
?>
                <div class="card">
                    <div class="card-header">
                        <h4>Users View</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Full Name</th>
                                        <th> Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $Model_users_blog = new Model_users_blog();
                                    $result = $Model_users_blog->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['full_name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>

                                                 <td>
                                                    <a href="users_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="../Controller/users_delate_controller.php" method="POST">
                                                        <!--onclik metodo di js ti permette di fare un controllo in questo caso viene usato per fare un controllo, al clik sul pulsante se continuare o meno l'azione del pulsante stesso che si prevede di utilizzare.-->
                                                        <button onClick="return confirm('Are you sure you want to delete?')" type="submit" name="delete_Users" value="<?php echo $row['id']; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>