<?php
include("db__connection.php");

$id = $_POST['id'];

$query = "DELETE FROM clan WHERE id=$id";
mysqli_query($db, $query) or die("Greška pri brisanju");

header("Location: iclanovi.php"); // ili tvoj naziv početne stranice
exit;
?>