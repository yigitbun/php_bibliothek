<?php

include 'config/db_connect.php';
require_once 'templates/header.php';



// Error array erstellten
$buchTitel = $desc = $verlag = $year = '';
$errors = array('buchTitel' => '', 'desc' => '', 'verlag' => '', 'year' => '');
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
    if (empty($_POST['year'])) {
        $errors['year'] = 'Bitte Jahr eingeben!';
    } else {
        // $year = $_POST['year'];
        // if (!preg_match('/^[a-zA-Z\s]+$/', $year)) {
        //     $errors['year'] = 'Bitte nur Nummer';
        // }
    }
    if (!empty($_POST['verlag'])) {
        $selected = $_POST['verlag'];
    } else {
        $errors['verlag'] = 'Sie haben keinen Verlag ausgewählt';
    }

    // Daten in der Datenbank speichern

    if (array_filter($errors)) {

        //
    } else {

        $buchTitel = mysqli_real_escape_string($conn, $_POST['buchTitel']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $verlag = mysqli_real_escape_string($conn, $_POST['verlag']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);

        // create sql

        $sql = "INSERT INTO books(title, description, publisher_id, publishing_year) VALUES('$buchTitel', '$desc', '$verlag', '$year')";

        // speichern und überprüfen
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        } else {
            // error
            echo 'query error:' . mysqli_error($conn);
        }
    }
}



?>


<div class="container">
    <br>
    <br>
    <br>
    <h1>Unsere Bibliothek</h1>
    <p>Das hier ist unsere öffentliche Bibliothek. Unten haben wir dir eine Übersicht aller unserer Bücher aufgebaut.</p>
    <form action="add.php" method="POST">
        <h3>Neues Buch anlegen</h3>
        <p>Mit dem unten stehenden Formular kannst du ein neues Buch zu unserer Bibliothek hinzufügen.</p>
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
            <label for="year" class="form-label">Jahr</label>
            <input type="text" class="form-control" id="year" name="year" value="<?php echo $year ?>">
            <div class="text-danger"><?php echo $errors['year']; ?></div>
        </div>
        <div class="mb-3">
            <label for="verlag" class="form-label">Verlag</label>
            <select class="form-select" aria-label="Default select example" name="verlag">
                <option disabled selected>Verlag auswählen</option>
                <option value="11">Verlag1</option>
                <option value="12">Verlag2</option>
                <option value="13">Verlag3</option>
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

<?php
require_once 'templates/footer.php';
?>