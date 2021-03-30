<?php

require_once 'db/conn.php';
require_once 'templates/header.php';

// Error array erstellten
$buchTitel = $desc = $verlag = '';
$errors = array('buchTitel' => '', 'desc' => '', 'verlag' => '');
$auswahl = '';
// 'submit' Anfrage stellen

if (isset($_POST['submit'])) {
    if (empty($_POST['buchTitel'])) {
        $errors['buchTitel'] = 'Bitte einen Buchtitel eingeben!';
    } else {
        $buchTitel = $_POST['buchTitel'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $buchTitel)) {
            $errors['buchTitel'] = 'Buchtitel darf nur aus Buchstaben und Leerzeichen bestehen!';
        }
    }
    if (empty($_POST['desc'])) {
        $errors['desc'] = 'Bitte eine Kurzbeschreibung eingeben!';
    } else {
        $desc = $_POST['desc'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $desc)) {
            $errors['desc'] = 'Kurzbeschreibung darf nur aus Buchstaben und Leerzeichen bestehen!';
        }
    }
    if (!empty($_POST['verlag'])) {
        $selected = $_POST['verlag'];
        $auswahl = 'Sie haben: ' . $selected . ' ausgewählt';
    } else {
        $errors['verlag'] = 'Sie haben keinen Verlag ausgewählt';
    }
}

?>
<br>
<br>

<div class="container">
    <h1>Unsere Bibliothek</h1>
    <form action="index.php" method="POST">
        <h3>Neues Buch anlegen</h3>
        <div class="mb-3">
            <label for="buchTitel" class="form-label">Buchtitel</label>
            <input type="text" class="form-control" id="buchTitel" name="buchTitel" value="<?php echo $buchTitel ?>">
            <div class="text-danger"><?php echo $errors['buchTitel']; ?></div>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Kurzbeschreibung</label>
            <textarea class="form-control" placeholder="Gebe hier eine kurze Beschreibung des Buches ein (max. 150 Zeichen)." id="desc" name="desc"><?php echo $desc ?></textarea>
            <div class="text-danger"><?php echo $errors['desc']; ?></div>
        </div>
        <div class="mb-3">
            <label for="verlag" class="form-label">Verlag</label>
            <select class="form-select" aria-label="Default select example" name="verlag">
                <option disabled selected>Verlag auswählen</option>
                <option value="Verlag1">Verlag1</option>
                <option value="Verlag2">Verlag2</option>
                <option value="Verlag3">Verlag3</option>
            </select>
            <div class="text-danger"><?php echo $errors['verlag']; ?></div>
        </div>


        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Die in diesem Formular eingegebene Daten werden wervendet, um ein neues Buch in unserer Datenbank anzulegen. Die Daten sind durch Absenden des Formular für die Öffentlichkeit einsehbar.</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Neues Buch erstellen</button>
    </form>
</div>
<br>
<br>
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