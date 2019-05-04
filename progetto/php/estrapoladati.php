<html>
<head>
<link rel="stylesheet" href="/./progetto/css/bootstrap.min.css">
<link rel="stylesheet" href="/./progetto/css/style.css">
</head>
<body class="body"></body>
</html>
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
} else {
    echo "Mi sono connesso";
    echo "<br>";
}

$sql = "SELECT nome, cognome, email, matricola FROM studenti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped table-dark\">"; 
    // Output dei dati di ciascuna riga del Database   
    while($row = $result->fetch_assoc()) {
       $nome = $row["nome"];
       $cognome = $row["cognome"];
       $email = $row["email"];
       $matricola = $row["matricola"];
    //Stampo in ogni riga della tabella HTML i dati del Database
       echo "<tr><td>" . $row['nome'] . "</td><td>" . $row['email'] . "</td></tr>"; 
    }
    echo "</table>";
   
} else {
    echo "0 results";
}
$conn->close();
?>