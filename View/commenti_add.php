<?php
session_start();
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelArticle.php';
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
                    ' . $_SESSION['message'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Comment Add</h4>
                    </div>
                    <div class="card-body">
                        <form action="../Controller/commentiController.php" method="POST">
                            <div class="mb-3">
                                <label for="">Titolo</label>
                                <input type="text" name="titolo" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Commento</label>
                                <textarea cols="30" rows="5" name="testo" required class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Valutazione</label>
                                <select class="form-select" aria-label="Default select example" name='reate' required>
                                    <option value="">valuta</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Scegli Articolo</label>
                                <select class="form-select" aria-label="Default select example" name='id_article' required>
                                    <option value="">Seleziona Articolo</option>
                                    <?php
                                    $modelArticle = new ModelArticle();
                                    $result = $modelArticle->index();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>

                                </select>
                            </div>
                            <!--botton select commenti-->
                            <div class="mb-3">
                                <label for="">Visibilità</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="active" role="switch" id="flexSwitchCheckDefault" value="1">
                                </div>
                            </div>


                    </div>

                </div>
                <div class="mt-3">
                    <button type="submit" name="save_comment" class="btn btn-primary">Save Comment</button>
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