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