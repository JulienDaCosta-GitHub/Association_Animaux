<?php
//logout code
session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location:accueil.php");
    }
 
?>