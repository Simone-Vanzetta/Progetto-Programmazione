<?php
  session_start();
   include "./../functions/formUserInput.php";
    $email = ReadString("email");
    $password = ReadString("password");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/./progetto/css/bootstrap.min.css">
    <link rel="stylesheet" href="/./progetto/css/style.css">
    <title>Login studente</title>
</head>
<body class="body"> 
        <form class="form" action="loginstudente.php" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Accedi all'Area Studenti">Login</button>
            </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="C:\xampp\htdocs\progetto\js\bootstrap.min.js"></script>
</body>
</html>
<?php
    if ( $email!=null)
    {

        if ($email=="" && $password=null){
            echo"<div class=\"form-control\">Specificare una login e password</div>";
        }
        else if ($email==null || $password=="")
            echo "<div class=\"form-control\">DEVI indicare la tua <b>password</b></div>";
        
        else if ($email=="mario.rossi@gmail.com" && $password=="mariorossi") {
                $_SESSION["email"]=$email;
		        $_SESSION["password"]=$password;    
        header("Location:esamistudente.php");
        }
        else 
            echo "<div class=\"form-control\">Mi spiace <b>$email</b>, NON sei stato autenticato !</div>";
  
      }
?>

