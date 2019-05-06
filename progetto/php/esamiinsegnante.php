<?php
session_start();
  /*
  Se l'Utente prova ad accedere alla pagina
  direttamente dall'URL senza aver fatto il Login,
  viene reindirizzato alla pagina "index.html"
  */
  if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    header("Location:./../html/index.html");
  }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Esami Insegnante</title>
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0.5);">
        <a class="navbar-brand" href="#">Esse4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Esami<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Voti</a>
            </li>
          </ul>
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION["nome"]." ". $_SESSION["cognome"]; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">
                  <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 197 297"><defs><style>.cls-1{fill:white;}</style></defs><title></title><g id="Livello_2" data-name="Livello 2"><g id="Livello_1-2" data-name="Livello 1"><path class="cls-1" d="M98.5,292A194.54,194.54,0,0,1,5,268.09V184.88A47.94,47.94,0,0,1,52.88,137h91.24A47.94,47.94,0,0,1,192,184.88v83.21A194.54,194.54,0,0,1,98.5,292Z"/><path d="M144.12,142A42.93,42.93,0,0,1,187,184.88V265.1a189.77,189.77,0,0,1-177,0V184.88A42.93,42.93,0,0,1,52.88,142h91.24m0-10H52.88A52.87,52.87,0,0,0,0,184.88V271a199.72,199.72,0,0,0,197,0V184.88A52.87,52.87,0,0,0,144.12,132Z"/><circle class="cls-1" cx="98.5" cy="63.5" r="58.5"/><path d="M98.5,10A53.5,53.5,0,1,1,45,63.5,53.56,53.56,0,0,1,98.5,10m0-10A63.5,63.5,0,1,0,162,63.5,63.5,63.5,0,0,0,98.5,0Z"/></g></g></svg>
                Profilo</a>
                <a class="dropdown-item" href="./../php/logout.php">
                  <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 265.77 425"><defs><style>.cls-2{fill:none;stroke:white;stroke-miterlimit:10;stroke-width:40px;}</style></defs><title>Risorsa 6</title><g id="Livello_2" data-name="Livello 2"><g id="Livello_1-2" data-name="Livello 1"><polyline class="cls-2" points="231 20 20 20 20 405 231 405"/><polyline class="cls-2" points="54 213 226.22 213 188.31 161.5"/><polyline class="cls-2" points="54 213 226.22 213 188.31 264.5"/><line class="cls-2" x1="231" y1="190" x2="231" y2="236.5"/><line class="cls-2" x1="200.09" y1="177.5" x2="226.58" y2="213.5"/><line class="cls-2" x1="204.14" y1="243" x2="229.16" y2="210"/></g></g></svg>
                Logout</a>
            </div>
          </div>
        </div>
      </nav>
      
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "essequattro";

///Creazione connessione

$conn = mysqli_connect($servername, $username, $password, $dbname );

// Controllo della connessione

if (!$conn) {
    die("Connessione al DB fallita: " . mysqli_connect_error());
} 

$sql = "SELECT Nome, Descrizione, Data, Orario, Aula FROM esami";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped table-dark\">"; 

    // Output dei dati di ciascuna riga del Database   

    while($row = $result->fetch_assoc()) {
       $nome = $row["Nome"];
       $descrizione = $row["Descrizione"];
       $data = $row["Data"];
       $orario = $row["Orario"];
       $orario = $row["Aula"];

    //Stampo in ogni riga della tabella HTML i dati del Database

       echo "<tr><td>" . $row['Nome'] ."</td><td>". $row['Descrizione'] ."</td><td>". $row['Data'] ."</td><td>". $row['Orario'] ."</td><td>". $row['Aula'] ."</td><td>". "</td></tr>"; 
    }
    echo "</table>";
   
} 
$conn->close();
?>
      <div class="form">
        <a href="./../html/nuovoesame.html">
          <button type="button" class="btn btn-primary">Inserisci nuovo esame</button>
        </a>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/./progetto/js/bootstrap.min.js"></script>
</body>
</html>
