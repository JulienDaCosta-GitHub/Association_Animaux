<?php include "header.php"; ?>



<?php
//including the database connection file

require_once('../Admin/Config/Crud.php') ;

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM produit ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

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
  foreach  ($result as $key => $res) {
      echo '<div class="card">';

      /*Condition

       Si l'animal est de type chien alors récupérer l'image dans le dossier corespondant miniature/Chien
       Si l'animal est de ty pe chat alors récupérer l'imafe dans le dossier correspondant miniature/Chat

       */

      if ($res['type_animal']=='chien' || $res['type_animal'] =='Chien')
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/Produit/' . $res["image"] . '" alt="Avatar"></div>';
      }
      elseif ($res['type_animal']==='chat' || $res['type_animal']==='Chat')
      {

          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/Produit/' . $res["image"] . '" alt="Avatar"></div>';



      }
      else
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/' . $res["image"] . '" alt="Avatar"></div>';



      }

      echo '
     
      <div class="card_container">
    
        <h4 class="title_card"><b>' . $res["nom"] . '</b></h4>
        <p>Type: ' . $res["type_animal"] . '</p>
        <p>Prix: ' . $res["prix"] . '€</p>
        <p>Stock: ' . $res["stock"] . ' unités</p>';
      echo "<td><a href=\"edit.php?id=$res[ID]\"><button class='btn  btn-dark'>Reserver</button></a> <a href=\"ficheproduit.php?id=$res[ID]\"><button class='btn btn-dark'>voir</button></a></td>";
      echo ' </div>
    </div>';


  }
      ?>

</div>



</body>

<?php include "footer.php"; ?>


