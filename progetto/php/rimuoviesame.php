<?php
    session_start();

    // includo le funzioni per recuperare i dati dal POST della pagina

    include "./../functions/formUserInput.php";

    $id = ReadInt("ID",null);
?>
<html>
<head>
<link rel="stylesheet" href="/./progetto/css/bootstrap.min.css">
<link rel="stylesheet" href="/./progetto/css/style.css">
</head>
<body class="body"></body>
</html>
<?php 
        $displayInput = true;
            if ($id!=null)
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "essequattro";
        
                //Creazione connessione 
                $conn = mysqli_connect($servername, $username, $password, $dbname );

                //Verifica connessione
                
                if (!$conn) {
                    die("<div class=\"alert alert-warning\">Connessione a MySQL fallita: " . mysqli_connect_error() . ")</div>");
                }
                else
                {
                            //Predispongo la stringa SQL per la rimozione dell'esame

                            $sql = "DELETE FROM  esami where id = $id";

                            /*
                            Stampo il messaggio di cancellazione e 
                            un link per tornare alla pagina principale
                            */

                            if (mysqli_query($conn, $sql)) {
                                        echo "
                                        <div class=\"form\">
                                            <div class=\"card\">
                                                Esame con ID $id cancellato correttamente!
                                            </div>

                                            <br>

                                            <a href=\"./../php/esamiinsegnante.php\">
                                                <button type=\"button\" class=\"btn btn-primary\" id=\"exam\">
                                                    Ritorna alla Pagina Principale
                                                </button>
                                            </a>
                                        </div>";
                                        $displayInput = false;
                            }
                     
                    else    {
                            echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
                            }
                }
            }
            if ( $displayInput)
            {

            ?>
            <div class="form">
                <form action="rimuoviesame.php" method="post">

                    <div class="form-group">
                            <label for="ID" style="color:white">ID Esame</label>
                            <input type="text" id="ID" name="ID" placeholder="Inserire ID Esame" class="form-control" value="<?php echo $id?>" maxlength="20"> 
                    </div>
                    <div>
                            <input type="submit" class="btn btn-danger" value="Rimuovi">
                    </div>

                    <a href="./../php/esamiinsegnante.php">
                        <button type="button" class="btn btn-primary" id="exam" style="margin-top: 10px;">Ritorna alla Pagina Principale</button>
                    </a>

                </form>
            </div>
        <?php } ?>