<?php
  session_start();
   include "./../functions/formUserInput.php";
    $email = ReadString("email");
    $password = ReadString("password");

    if ( $email!=null)
    {

        if ($email=="" && $password=null){
            echo "<link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
            <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\"><div class=\"form-control\">Specificare una <b>Email</b> e <b>Password</b></div>";
        }
        else if ($email==null || $password=="")
            echo "
            <head>
                <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
            </head>
            <body class=\"body\">
                <div class=\"form\">
                    DEVI indicare la tua <b>Password</b> <br>
                    <a href=\"./../html/logininsegnante.html\">
                        <button class=\"btn btn-primary\">Ritorna alla pagina di Login</button>
                    </a>
                </div>
            </body>";
        
        else if ($email=="professore.rossi@gmail.com" && $password=="professorerossi") {
                $_SESSION["email"]=$email;
		        $_SESSION["password"]=$password;    
        header("Location:./../html/esamiinsegnante.html");
        }
        else 
            echo "
            <head>
                <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
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
      if ($email==null && $password==null) {
        echo "
        <head>
            <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
            <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
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
    if ($email==null && $password!=null) {
        echo "
        <head>
            <link rel=\"stylesheet\" href=\"/./progetto/css/bootstrap.min.css\">
            <link rel=\"stylesheet\" href=\"/./progetto/css/style.css\">
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