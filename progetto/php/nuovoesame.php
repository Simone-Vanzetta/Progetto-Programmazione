<html>
<head>
<link rel="stylesheet" href="/./progetto/css/bootstrap.min.css">
<link rel="stylesheet" href="/./progetto/css/style.css">
</head>
<body class="body"></body>
</html>
<?php
session_start();

/*
Includo il file FormUserInput per controllare
se sono settate le variabili POST
*/
include "./../functions/formUserInput.php";

$nome = ReadString("nome");
$descrizione = ReadString("descrizione");
$data = ReadString("data");
$orario = ReadString("orario");
$dipartimento = ReadString("dipartimento");
$aula = ReadString("aula");



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
$sql = "INSERT INTO esami (Nome, Descrizione, Data, Orario, Dipartimento, Aula)
VALUES ('".$nome."','".$descrizione."','".$data."','".$orario."','".$dipartimento."','".$aula."');";
$result = $conn->query($sql);

echo "
<div class=\"form\">
    Esame inserito correttamente!<br>
    <a href=\"./../php/esamiinsegnante.php\">
        <button class=\"btn btn-primary\">Ritorna alla pagina Principale</button>
    </a>
</div>";

$conn->close();
?>