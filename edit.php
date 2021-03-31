<br>

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