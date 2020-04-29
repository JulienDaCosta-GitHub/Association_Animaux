<?php
// code a mettre sur la page accueil ou une page a part, pour dire qu'on s'est bien connecté
    session_start();
 
    if(isset($_SESSION['user']))
    {
        echo ' vous avez reussi a vous connecter ' . $_SESSION['user'].'<br/>';
        
        echo '<a href="deconnexion.php?logout">Logout</a>';
    }
?>