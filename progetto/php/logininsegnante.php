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
        $sql = "SELECT nome, cognome, password, id, email FROM professori WHERE email= '$email'";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            // mettiamo le sue info in variabili di tipo session per poterle recuperare comodamente
            while($row = $result->fetch_assoc()) {
                $_SESSION["nome"] = $row["nome"];
                $_SESSION["cognome"] = $row["cognome"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["password"] = $row["password"];
                $_SESSION["email"] = $row["email"];
                }
            }
    //L'utente può effetuare il login solo se la password è quella corrispondente alla sua email
     if ($password == $_SESSION["password"]) {
        header("Location:esamiinsegnante.php");
    }
        
        /*  
            Se l'Utente inserisce la Mail 
            e la Password NON corretti
        */
        else {
            echo "
            <head>
                <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
                <title>Errore Login</title>
            </head>
            <body class=\"body\">
                <div class=\"form\">
                    <b>Username</b> e/o <b>Password</b> non corretti <br>
                    <a href=\"./../html/logininsegnante.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>  
            </body>";
        }    
    }
    /*  
        Se l'Utente NON inserisce nè la Mail 
        nè la Password
    */
      if ($email==null && $password==null) {
        echo "
        <head>
            <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
            <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
            <title>Errore Login</title>
        </head>
        <body class=\"body\">
            <div class=\"form\">
                Specificare una <b>Email</b> e una <b>Password</b> <br>
                <a href=\"./../html/logininsegnante.html\">
                    <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                </a>
            </div>  
        </body>";
    }
    /*  
        Se l'utente inserisce la Password 
        ma NON inserisce la Mail
    */
    if ($email==null && $password!=null) {
        echo "
        <head>
            <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
            <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
            <title>Errore Login</title>
        </head>
        <body class=\"body\">
            <div class=\"form\">
                Devi specificare la tua <b>Email</b> <br>
                <a href=\"./../html/logininsegnante.html\">
                    <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                </a>
            </div>  
        </body>";
    }
?>
