<?php
include("db__connection.php");

$id = $_POST['id'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$jmbg = $_POST['jmbg'];
$adresa = $_POST['adresa'];
$telefon = $_POST['telefon'];
$godisnja_ulaznica = isset($_POST['godisnja_ulaznica']) ? 1 : 0;

$query = "UPDATE clan SET 
            ime='$ime', 
            prezime='$prezime', 
            jmbg='$jmbg', 
            adresa='$adresa', 
            telefon='$telefon', 
            godisnja_ulaznica='$godisnja_ulaznica' 
          WHERE id=$id";

mysqli_query($db, $query) or die("Greška u upitu");

header("Location: clanovi.php"); 
exit;
?>