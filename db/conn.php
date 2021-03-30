<?php
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "byigit";
$password = "hamm";
$database = "bibliothek";

// Verbindung zur Datenbank herstellen
$conn = mysqli_connect('localhost', 'byigit', 'hamm', 'bibliothek');

// Verbindungsprüfung
if (!$conn) {
    echo "Verbindung fehlgeschlagen" . mysqli_connect_error();
}

// Anfrage für Bücher schreiben

$sql = 'SELECT title, description FROM books';

// eine Abfrage machen & Ergebnis erhalten

$result = mysqli_query($conn, $sql);

// die resultierenden Zeilen als Array holen

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
