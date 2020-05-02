<?php include "header.php"; ?>


<?php 
//connexion bdd

  $con=mysqli_connect('localhost','root','root','association_animaux', '8889');

  if(!$con)
  {
      die(' Please Check Your Connection'.mysqli_error($con));
  }

  $produits =  $con->query('SELECT * FROM produit');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>