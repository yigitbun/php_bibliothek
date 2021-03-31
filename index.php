<?php
include 'config/db_connect.php';
require_once 'templates/header.php';

if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM books WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: index.php');
    } {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}
if (isset($_POST['update'])) {

    $id_to_update = mysqli_real_escape_string($conn, $_POST['id_to_update']);



    $sql = "UPDATE books SET title='$buchTitel' WHERE id = $id_to_update";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: add.php');
    } {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}

?>
<div class="container">
    <h2>Unsere Bücher</h2>
    <!-- 
            // Beispiel Card
            
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Harry Potter und der Stein der Weisen</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Unten Cards -->
    <div class="container">
        <div class="row">
            <?php foreach ($books as $book) { ?>
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p><img src="img/book.png" alt="" style="width:15rem;"></p>
                            <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($book['description']); ?></p>

                            <!-- DELETE FORM -->

                            <form action="index.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $book['id']; ?>">
                                <input class="btn btn-success" type="submit" name="update" value="Update"><br><br>
                                <input type="hidden" name="id_to_update" value="<?php echo $book['id']; ?>">
                                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>


<?php require_once 'templates/footer.php'; ?>