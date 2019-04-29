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
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $nome = $row["nome"];
       $cognome = $row["cognome"];
       $email = $row["email"];
       $matricola = $row["matricola"];
    }
} else {
    echo "0 results";
}
echo "N matricola  $matricola Nome:  $nome Cognome:  $cognome";
$conn->close();
?>