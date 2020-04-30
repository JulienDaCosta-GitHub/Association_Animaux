<?php include "header.php"; ?>

<?php 
//connexion bdd

  $con=mysqli_connect('localhost','root','','association_animaux', '3308');
 
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
    <title>Nos produits</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<h2 class="title"><b>Liste des produits<b></h2>

<div class="all_cards">

<?php
  foreach  ($produits as $produit) {
      echo '<div class="card">
      <div class="cadre"><img class="img_card" src="IMG/' . $produit["image"] . '" alt="Avatar"></div>
      <div class="card_container">
    
        <h4 class="title_card"><b>' . $produit["nom"] . '</b></h4>
        <p>Type: ' . $produit["type_animal"] . '</p>
        <p>Prix: ' . $produit["prix"] . '€</p>
        <p>Stock: ' . $produit["stock"] . ' unités</p>
      </div>
    </div>';
}
      ?>

</div>


<?php include "footer.php"; ?>
    
</body>
</html>

