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
      echo '<div class="card">';

      /*Condition

       Si l'animal est de type chien alors récupérer l'image dans le dossier corespondant miniature/Chien
       Si l'animal est de ty pe chat alors récupérer l'imafe dans le dossier correspondant miniature/Chat

       */

      if ($produit['type_animal']=='chien' || $produit['type_animal'] =='Chien')
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/Produit/' . $produit["image"] . '" alt="Avatar"></div>';
      }
      elseif ($produit['type_animal']==='chat' || $produit['type_animal']==='Chat')
      {

          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/Produit/' . $produit["image"] . '" alt="Avatar"></div>';



      }
      else
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/' . $produit["image"] . '" alt="Avatar"></div>';



      }

      echo '
     
      <div class="card_container">
    
        <h4 class="title_card"><b>' . $produit["nom"] . '</b></h4>
        <p>Type: ' . $produit["type_animal"] . '</p>
        <p>Prix: ' . $produit["prix"] . '€</p>
        <p>Stock: ' . $produit["stock"] . ' unités</p>
        <button type="button" class="btn btn-primary">Acheter</button>
      </div>
    </div>';
}
      ?>

</div>


<?php include "footer.php"; ?>
    
</body>
</html>

