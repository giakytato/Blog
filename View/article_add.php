<?php 
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';
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
                <?php
                if (isset($_SESSION['message'])) {
                    // echo "<h5>" . $_SESSION['message'] . "</h5>";
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    '. $_SESSION['message'] .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Article Add</h4>
                    </div>
                    <div class="card-body">
                        <form action="../Controller/articleController.php" method="POST">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Subtitle</label>
                                <input type="text" name="sub_title" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Article</label>
                                <textarea cols="30" rows="5" name="art_text" required class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Select Category</label>
                                <select class="form-select" aria-label="Default select example" name='id_category' required>
                                    <option value="">Select the Category</option>
                                    <?php
                                    $ModelCategory = new ModelCategory();
                                    $result = $ModelCategory->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                         <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_article" class="btn btn-primary">Save Article</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>