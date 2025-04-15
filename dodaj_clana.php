<?php
include("db__connection.php");

// Provera da li su polja postavljena i nisu prazna
if (
    isset($_POST['ime'], $_POST['prezime'], $_POST['jmbg'], $_POST['adresa'], $_POST['telefon']) &&
    !empty($_POST['ime']) &&
    !empty($_POST['prezime']) &&
    !empty($_POST['jmbg']) &&
    !empty($_POST['adresa']) &&
    !empty($_POST['telefon'])
) {
    $ime = mysqli_real_escape_string($db, $_POST['ime']);
    $prezime = mysqli_real_escape_string($db, $_POST['prezime']);
    $jmbg = mysqli_real_escape_string($db, $_POST['jmbg']);
    $adresa = mysqli_real_escape_string($db, $_POST['adresa']);
    $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
    $godisnja_ulaznica = isset($_POST['godisnja_ulaznica']) ? 1 : 0;

    $query = "INSERT INTO clan (ime, prezime, jmbg, adresa, telefon, godisnja_ulaznica)
              VALUES ('$ime', '$prezime', '$jmbg', '$adresa', '$telefon', $godisnja_ulaznica)";

    if (mysqli_query($db, $query)) {
        header("Location: index.php"); // ili druga glavna stranica
        exit();
    } else {
        echo "<div style='color: red; font-weight: bold; text-align: center; margin-top: 20px;'>Greška prilikom unosa u bazu.</div>";
    }
} else {
    echo "<div style='color: red; font-weight: bold; text-align: center; margin-top: 20px;'>Član se ne može dodati – sva polja su obavezna.</div>";
}
?>