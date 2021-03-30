<?php
include 'config/db_connect.php';
require_once 'templates/header.php';
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
                            <a href="#" class="btn btn-primary">Bearbeiten</a>
                            <a href="#" class="btn btn-primary">Löchen</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>


<?php require_once 'templates/footer.php'; ?>