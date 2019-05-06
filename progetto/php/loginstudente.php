<html>
<head>
    <link rel="stylesheet" href="./../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Errore Login</title>
<head>
<body class="body">
</body>  
</html>
<?php
  session_start();
  /*
    Includo il file FormUserInput e uso la funzione 
    Readstring per controllare se sono settati
    email e password
  */
   include "./../functions/formUserInput.php";
    $email = ReadString("email");
    $password = ReadString("password");
    
    if ( $email!=null)
    {
        /*  
            Se l'Utente inserisce la Mail 
            e la Password corretti (presenti nel DB) viene
            spedito alla pagina "esamistudente.php"
        */
            $servername = "localhost";
            $username = "root";
            $passworddb = "";
            $dbname = "essequattro";
            //Accesso al Database per recuperare le informazioni sull'utente
            //Creazione connessione
            $conn = mysqli_connect($servername, $username, $passworddb, $dbname );
            // Controllo della connessione
            if (!$conn) {
                die("Connessione al DB fallita: " . mysqli_connect_error());
            } else {
            }
                
            //Ricaviamo le informazioni sull'utente collegate alla sua email
            $sql = "SELECT nome, cognome, password, matricola, email FROM studenti WHERE email= '$email'";
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0) {
                // mettiamo le sue info in variabili di tipo session per poterle recuperare comodamente
                while($row = $result->fetch_assoc()) {
                    $_SESSION["nome"] = $row["nome"];
                    $_SESSION["cognome"] = $row["cognome"];
                    $_SESSION["matricola"] = $row["matricola"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["email"] = $row["email"];
                    }
                }
        //L'utente può effetuare il login solo se la password è quella corrispondente alla sua email
         if ($password == $_SESSION["password"] && $email == $_SESSION["email"]) {
            header("Location:esamistudente.php");
        }
        /*  
            Se l'Utente inserisce la Mail 
            e la Password NON corretti
        */
        if ($password != $_SESSION["password"]) {
            echo "
                <div class=\"form\">
                    <b>Username</b> e/o <b>Password</b> non corretti <br>
                    <a href=\"./../html/loginstudente.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>";
        }    
    }
    /*  
        Se l'Utente NON inserisce nè la Mail 
        nè la Password
    */
      if ($email==null && $password==null) {
        echo "
            <div class=\"form\">
                Specificare una <b>Email</b> e una <b>Password</b> <br>
                <a href=\"./../html/loginstudente.html\">
                    <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                </a>
            </div>";
    }
    /*  
        Se l'utente inserisce la Password 
        ma NON inserisce la Mail
    */
    if ($email==null && $password!=null) {
        echo "
        <body class=\"body\">
            <div class=\"form\">
                Devi specificare la tua <b>Email</b> <br>
                <a href=\"./../html/loginstudente.html\">
                    <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                </a>
            </div>";
    }
?>

