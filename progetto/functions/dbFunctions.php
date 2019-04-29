<?php
    // Questa funzione mi consente di cercare nel database l'esistenza di un record
    // con uno specifico valore ($value) per una determinata colonna ($column) 
    // di una determinata tabella ($table)
    function record_exists ($connection,$table, $column, $value) {
        $query = "SELECT * FROM {$table} WHERE {$column} = {$value}";
        $result = mysqli_query($connection, $query);
                
        if (mysqli_num_rows($result) >0 ){
            return TRUE;
        } else {
            return FALSE;
        }
    }
?>