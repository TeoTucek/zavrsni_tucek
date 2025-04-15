<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ribolovni_klub';

// Povezivanje na bazu
$db = mysqli_connect($server, $username, $password, $database);

// Provjera konekcije
if (!$db) {
    die("Greška pri povezivanju s bazom: " . mysqli_connect_error());
} else {
    echo "Uspješno povezano s bazom!"; 
}
?>
