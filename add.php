<div class="container">
    <div class="row">
        <?php foreach ($books as $book) { ?>
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($book['description']); ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        <p><?php $auswahl; ?></p>
                    </div>

                </div>

            </div>
        <?php } ?>
    </div>

</div>