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
        
            //Accesso al Database per recuperare le informazioni sull'utente

            $servername = "localhost";
            $username = "root";
            $passworddb = "";
            $dbname = "essequattro";

            //Creazione connessione

            $conn = mysqli_connect($servername, $username, $passworddb, $dbname );
            
            // Controllo della connessione
            
            if (!$conn) {
                die("Connessione al DB fallita: " . mysqli_connect_error());
            } else {
            }
                
            // Ricaviamo le informazioni sull'utente collegate alla sua email

            $sql = "SELECT nome, cognome, password, id, email FROM professori WHERE email= '$email'";
            $result = $conn->query($sql);
                
            if ($result->num_rows > 0) {

            // Mettiamo le sue info in variabili di tipo session per poterle recuperare comodamente

                while($row = $result->fetch_assoc()) {
                    $_SESSION["nome"] = $row["nome"];
                    $_SESSION["cognome"] = $row["cognome"];
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["email"] = $row["email"];
                    }
            }
    
    /*
    Controllo se è settata la variabile SESSION
    (per evitare l'errore undefined index)
    */

    if (isset($_SESSION["email"])) {
            
        //Se l'Email è giusta
        
        if ($email == $_SESSION["email"]) {

                //Se la Password è giusta l'utente entra nel sistema

                if ($password == $_SESSION["password"]) {
                        header("Location:esamiinsegnante.php");
                        exit;
                    }

                 //Se la Password è sbagliata

                else {
                    echo "
                <div class=\"form\">
                    <b>Password</b> non corretta<br>
                    <a href=\"./../html/logininsegnante.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>";
                }
        }
    }

        /*  
            Se l'Utente inserisce la Mail 
            e/o la Password NON corretti
        */
        else {
            echo "
                <div class=\"form\">
                    <b>Username</b> e/o <b>Password</b> non corretti <br>
                    <a href=\"./../html/logininsegnante.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>";
        } 
?>
