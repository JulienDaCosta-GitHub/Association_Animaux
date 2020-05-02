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
    

        <h4 class="title_card"><b>' . $produit["nom"] . '</b></h4>
        <p>Type: ' . $produit["type_animal"] . '</p>
        <p>Prix: ' . $produit["prix"] . '€</p>
        <p>Stock: ' . $produit["stock"] . ' unités</p>
        <button type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary" value="Acheter">
            <a href="panier.php"></a>
            Acheter
         </button>   

      </div>
    </div>';
}
      ?>

</div>


    <!--texte-->
<h1 class="center-text" style="font-size:60px"><u>Voici tous nos produits.</u></h1><br><br>
<h3 class="center-text" style="font-size:30px">Parce que vos animaux le mérite bien !<br><br></h3>


</body>
</html>