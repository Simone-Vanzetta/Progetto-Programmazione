<?php
	session_start();

	session_unset();
	
	session_destroy();

    Header("Location:./../html/index.html"); 
    
    exit; 
?>