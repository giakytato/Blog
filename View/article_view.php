<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelArticle.php';
include __DIR__ . '/../Model/ModelCategory.php';
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
                        <h4>Article List</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titolo</th>
                                        <th>Categoria</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ModelArticle = new ModelArticle();
                                    $result = $ModelArticle->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                            $articleID = $row['id'];
                                            $id_category = $row['id_category'];
                                    ?>
                                            <tr>
                                                <td><?php echo $articleID;?></td>
                                                <td><?php echo $row['title']; ?></td> 
                                                <?php
                                                $ModelCategory = new ModelCategory();
                                                $result2 = $ModelCategory->index();
                                                if ($result2) {
                                                    foreach ($result2 as $row){
                                                        $category_ID = $row['id'];
                                                        if($category_ID == $id_category){

                                                        
                                                ?>
                                                <td><?php echo $row['category_name']; ?></td>

                                                <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "No Record Found";
                                                }
                                                ?>
                                                 <td>
                                                    <a href="article_edit.php?id=<?php echo $articleID; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="../Controller/Article_delete_controller.php" method="POST">
                                                        <button onClick="return confirm('Are you sure you want to delete?')" type="submit" name="deleteArticle" value="<?php echo $articleID; ?>" class="btn btn-danger">Delete</button>
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