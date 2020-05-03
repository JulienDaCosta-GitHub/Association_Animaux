<?php include "header.php";

if(isset($_POST['ajouter'])){
    $_SESSION['form']['quantite']=$_POST['quantite'];
    echo 'voila le resultat' . $_SESSION['form']['quantite']. '!';
}

?>

<form action="" method="post" name="form">
    <input type="text" name="quantite">
    <button class="btn btn-dark" name="ajouter">confirmer</button>
</form>

