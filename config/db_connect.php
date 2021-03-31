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
    die("Connection failed: " . mysqli_connect_error());
}
