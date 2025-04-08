<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="\slike\images.jfif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ribolovni Klub</title>
  </head>
  <body>

  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Početno</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Linkovi</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Izbornik</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Zanimljivosti</a></li>
                <li><a class="dropdown-item" href="#">Natjecanja</a></li>
                <li><hr class="dropdown-divider"></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Dodaj novog clana</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Podaci o clanu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Forma za unos podataka -->
            <form action="dodaj_clana.php" method="POST">
              <div class="mb-3">
                <label for="ime" class="form-label">Ime</label>
                <input type="text" class="form-control" id="ime" name="ime" required>
              </div>
              <div class="mb-3">
                <label for="prezime" class="form-label">Prezime</label>
                <input type="text" class="form-control" id="prezime" name="prezime" required>
              </div>
              <div class="mb-3">
                <label for="jmbg" class="form-label">JMBG</label>
                <input type="text" class="form-control" id="jmbg" name="jmbg" required>
              </div>
              <div class="mb-3">
                <label for="adresa" class="form-label">Adresa</label>
                <input type="text" class="form-control" id="adresa" name="adresa" required>
              </div>
              <div class="mb-3">
                <label for="telefon" class="form-label">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required>
              </div>

              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="godišnja_ulaznica" name="godišnja_ulaznica">
                <label class="form-check-label" for="godišnja_ulaznica">Godišnja Ulaznica</label>
              </div>
              <button type="submit" class="btn btn-primary">Pošalji</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
          </div>
        </div>
      </div>
    </div>

    <h2>Naši Članovi</h2>

    <?php
    include("db_connection.php");
    ?>

    <!-- Tabela sa podacima -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Ime</th>
          <th scope="col">Prezime</th>
          <th scope="col">Aktivna clanarina</th>
          <th scope="col">JMBG</th>
          <th scope="col">Adresa</th>
          <th scope="col">Telefon</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT ime, prezime, godisnja_ulaznica, jmbg, adresa, telefon FROM clan";
        $result = mysqli_query($db, $query) or die ("Greska u SQLu");
        while($row = mysqli_fetch_array($result)) {
          echo '<tr>';
          echo '<td>' . $row["ime"] . '</td>';
          echo '<td>' . $row["prezime"] . '</td>';

          // Aktivna članarina (checkbox ikona)
          if ($row["godisnja_ulaznica"] == 1) {
            echo '<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
</svg></td>';
          } else {
            echo '<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16">
  <path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704"/>
  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
</svg></td>';
          }

          echo '<td>' . $row["jmbg"] . '</td>';
          echo '<td>' . $row["adresa"] . '</td>';
          echo '<td>' . $row["telefon"] . '</td>';
          echo '</tr>';
        }
        ?>

      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
