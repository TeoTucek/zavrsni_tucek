<?php
include("db__connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = mysqli_real_escape_string($db, $_POST["ime"]);
    $prezime = mysqli_real_escape_string($db, $_POST["prezime"]);
    $jmbg = mysqli_real_escape_string($db, $_POST["jmbg"]);
    $adresa = mysqli_real_escape_string($db, $_POST["adresa"]);
    $telefon = mysqli_real_escape_string($db, $_POST["telefon"]);
    $godisnjaUlaznica = isset($_POST["godisnjaUlaznica"]) ? 1 : 0;

    $query = "INSERT INTO clan (ime, prezime, jmbg, adresa, telefon, godisnja_ulaznica) 
              VALUES ('$ime', '$prezime', '$jmbg', '$adresa', '$telefon', '$godisnjaUlaznica')";

    if (mysqli_query($db, $query)) {
        echo "Član je uspešno dodat!";
        header("Location: clanovi.php"); 
        exit();
    } else {
        echo "Greška: " . mysqli_error($db);
    }
}
?>
