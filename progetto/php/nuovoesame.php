<html>
<head>
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Nuovo Esame</title>
</head>
<body class="body"></body>
</html>
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

/*
Includo il file FormUserInput per controllare
se sono settate le variabili POST
*/

include "./../functions/formUserInput.php";

$nome = ReadString("nome");
$descrizione = ReadString("descrizione");
$data = ReadString("data");
$orario = ReadString("orario");
$aula = ReadString("aula");
$cognomeprof = $_SESSION["cognome"];



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

//Inserisco i dati della form HTML nella tabella

$sql = "INSERT INTO esami (Nome, Descrizione, Data, Orario, Aula, professori)
VALUES ('".$nome."','".$descrizione."','".$data."','".$orario."','".$aula."','".$cognomeprof."');";
$result = $conn->query($sql);

/*
Dico all'utente che ha inserito i dati
e metto un pulsante che ritorna a 
"esamiinsegnante.php"
*/
echo "
<div class=\"form\">
    Esame inserito correttamente!<br>
    <a href=\"./../php/esamiinsegnante.php\">
        <button class=\"btn btn-primary\">Ritorna alla pagina Principale</button>
    </a>
</div>";

$conn->close();
?>
