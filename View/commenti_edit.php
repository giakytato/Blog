<?php
include __DIR__ . '/../Connection/DBconn.php';
include __DIR__ . '/../Model/ModelCategory.php';
include __DIR__ . '/../Model/Model_commenti.php';
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
                        <h4>Commenti Edit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $commentiID = $_GET['id'];
                            $commenti = new Model_commenti();
                            $result = $commenti->edit($commentiID);

                            if ($result) {
                                $isactive = $result['active'];
                                $reate = $result['reate'];
                                $article_ID = $result['id_article'];

                                if($isactive==1){
                                    $stato_toggle = 'on';
                                    $checkbox_value = 1;
                                } else {
                                    $stato_toggle = 'off';
                                    $checkbox_value = 0;
                                }


                        ?>
                                <form action="../Controller/Commenti_update_controller.php" method="POST">
                                    <input type="hidden" name="commentiID" value="<?php echo $commentiID; ?>">

                                    <div class="mb-3">
                                        <label for="">Titolo</label>
                                        <input type="text" name="titolo" required class="form-control" value="<?php echo $result['titolo']; ?>" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Commento</label>
                                        <textarea cols="30" rows="5" name="testo" required class="form-control"><?php echo $result['testo']; ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Valutazione</label>
                                        <select class="form-select" aria-label="Default select example" name='reate' required>
                                            <option value="">valuta</option>
                                            <option value="1" <?php if ($reate == 1) {
                                                                    echo 'selected';
                                                                } ?>>1</option>
                                            <option value="2" <?php if ($reate == 2) {
                                                                    echo 'selected';
                                                                } ?>>2</option>
                                            <option value="3" <?php if ($reate == 3) {
                                                                    echo 'selected';
                                                                } ?>>3</option>
                                            <option value="4" <?php if ($reate == 4) {
                                                                    echo 'selected';
                                                                } ?>>4</option>
                                            <option value="5" <?php if ($reate == 5) {
                                                                    echo 'selected';
                                                                } ?>>5</option>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label for="">Scegli Articolo</label>
                                        <select class="form-select" aria-label="Default select example" name='id_article' required>
                                            <option value="">Seleziona Articolo</option>
                                            <?php
                                            $modelArticle = new ModelArticle();
                                            $result2 = $modelArticle->index();
                                            if ($result2) {
                                                foreach ($result2 as $row2) {
                                                    $id_article = $row2['id'];
                                            ?>
                                                    <option value="<?php echo $id_article; ?>" <?php if ($id_article == $article_ID){echo 'selected';} ?>><?php echo $row2['title']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No Record Found";
                                            }
                                            ?>


                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="">Visibilità</label> <?php echo $isactive; ?>
                                        <!-- 
                                            Come nella tabella commenti view
                                            mostra le lable Attivo, Non attivo
                                            in pratica guarda if e qui stampi la variabile.. 
                                            È identico a quello fatto in commenti_view.php

                                            Nota. 
                                            $isactive l'ho gia richiamato sopra.. quindi manca l'if soltanto

                                            Il pulsante sotto puoi eliminarlo o lasciarlo poi lo sistemiamo
                                        -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="active" role="switch" id="flexSwitchCheckDefault" value="1" <?php if($stato_toggle == 'on'){ echo 'checked';} ?>>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_commenti" class="btn btn-primary">Save Comment</button>
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