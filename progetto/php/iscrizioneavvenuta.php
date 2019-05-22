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
Creo la variabile matricola che prende i dati del numero
di matricola dalla variabile SESSION
*/ 

$matricola = $_SESSION["matricola"];

//Includo il file formuserinput per controllare se è settato l'id dell'esame

include "./../functions/formUserInput.php";
$esame = ReadInt("idesame",null);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Iscrizione Avvenuta</title>
</head>
<body class="body">
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "essequattroo";

///Creazione connessione

$conn = mysqli_connect($servername, $username, $password, $dbname );

// Controllo della connessione

if (!$conn) {
    die("Connessione al DB fallita: " . mysqli_connect_error());
} 


//Inserisco l'ID dell'esame e la matricola dentro la tabella iscritti del Database

$sql = "INSERT INTO iscritti (matricola, esami) VALUES ('".$matricola."','".$esame."');";
$result = $conn->query($sql);

//Stampo un messaggio che dice all'utente che l'iscrizione è avvenuta con successo

echo "
<div class=\"form\">
    Iscrizione Avvenuta!<br>
    <a href=\"./../php/esamistudente.php\">
        <button class=\"btn btn-primary\">Ritorna alla pagina Principale</button>
    </a>
</div>";


$conn->close();
?>