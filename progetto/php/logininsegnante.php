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
            ma NON inserisce la Password
        */
        if ($email==null || $password=="") {
            echo "
            <head>
                <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
                <title>Errore Login</title>
            </head>
            <body class=\"body\">
                <div class=\"form\">
                    DEVI indicare la tua <b>Password</b> <br>
                    <a href=\"./../html/logininsegnante.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>
            </body>";
        }
        /*  
            Se l'Utente inserisce la Mail 
            e la Password corretti viene
            spedito alla pagina "esamiinsegnante.html"
        */
        else if ($email=="professore.rossi@gmail.com" && $password=="professorerossi") {
                $_SESSION["email"]=$email;
		        $_SESSION["password"]=$password;    
        header("Location:./../html/esamiinsegnante.html");
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