<?php
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';
include __DIR__ . '/../Model/ModelArticle.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOPS edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid px-4">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Article Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $article_id = $_GET['id'];
                            $article = new ModelArticle();
                            $result = $article->edit($article_id);

                            if ($result) {
                               // $id_category = $row['id_category'];
                                
                        ?>
                                <form action="../Controller/Article_update_controller.php" method="POST">
                                    <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">

                                    <div class="mb-3">
                                        <label for="">Title</label>
                                        <input type="text" name="title" required class="form-control" value="<?php echo $result['title']; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Subtitle</label>
                                        <input type="text" name="sub_title" required class="form-control" value="<?php echo $result['sub_title']; ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Article</label>
                                        <textarea cols="30" rows="5" name="art_text" required class="form-control"><?php echo $result['art_text']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Select Category: <?php echo $id_category;?></label>
                                        <select class="form-select" aria-label="Default select example" name='id_category' required>
                                            <option value="">Select the catergory</option>
                                            <?php
                                            $ModelCategory = new ModelCategory();
                                            $result = $ModelCategory->index();
                                            if ($result) {
                                                foreach ($result as $row) {
                                                    $category_ID = $row['id'];
                                            ?>
                                                <option value="<?php echo $category_ID;?>"><?php echo $row['category_name'];?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No Record Found";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_article" class="btn btn-primary">Save Article</button>
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