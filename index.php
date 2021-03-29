<?php
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "byigit";
$password = "hamm";
$database = "bibliothek";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo 'Erfolgreich verbunden';

} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen";
}

// Error array erstellten

$errors = array('buchTitel' => '', 'desc' => '', 'verlag' => '');

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
    if (empty($_POST['verlag'])) {
        $errors['verlag'] = 'Bitte einen Verlag auswählen!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsere Bibliothek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Unsere Bibliothek</h1>
        <form action="index.php" method="POST">
            <h3>Neues Buch anlegen</h3>
            <div class="mb-3">
                <label for="buchTitel" class="form-label">Buchtitel</label>
                <input type="text" class="form-control" id="buchTitel" name="buchTitel">
                <div class="text-danger"><?php echo $errors['buchTitel']; ?></div>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Kurzbeschreibung</label>
                <textarea class="form-control" placeholder="Gebe hier eine kurze Beschreibung des Buches ein (max. 150 Zeichen)." id="desc" name="desc"></textarea>
                <div class="text-danger"><?php echo $errors['desc']; ?></div>
            </div>
            <div class="mb-3">
                <label for="verlag" class="form-label">Verlag</label>
                <select class="form-select" aria-label="Default select example" name="verlag">
                    <option selected value="0">Verlag auswählen</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
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

    <!-- Unten Cards -->
    <div class="container">
        <h2>Unsere Bücher</h2>

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
        </div>

    </div>


    <!-- Footer Bereich -->
    <div class="container">
    </div>
</body>

</html>