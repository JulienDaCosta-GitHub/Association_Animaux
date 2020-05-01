<?php include "header.php"; ?>

<?php 
//connexion bdd

  $con=mysqli_connect('localhost','root','','association_animaux', '3308');
 
  if(!$con)
  {
      die(' Please Check Your Connection'.mysqli_error($con));
  }

  $animals =  $con->query('SELECT * FROM animal');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos animaux</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<h2 class="title"><b>Liste des animaux<b></h2>

<div class="all_cards">

<?php
  foreach  ($animals as $animal) {
      echo '<div class="card">' ;

        /*Condition

        Si l'animal est de type chien alors récupérer l'image dans le dossier corespondant miniature/Chien
        Si l'animal est de ty pe chat alors récupérer l'imafe dans le dossier correspondant miniature/Chat

        */
      if ($animal['type']=='chien' || $animal['type'] =='Chien')
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/' . $animal["image"] . '" alt="Avatar"></div>';
      }
      elseif ($animal['type']==='chat' || $animal['type']==='Chat')
      {

          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/' . $animal["image"] . '" alt="Avatar"></div>';



      }
      else
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/' . $animal["image"] . '" alt="Avatar"></div>';



      }

  echo    '

      <div class="card_container">
    
        <h4 class="title_card"><b>' . $animal["nom"] . '</b></h4>
        <p>Type: ' . $animal["type"] . '</p>
        <p>Race: ' . $animal["race"] . '</p>
        <p>Age: ' . $animal["age"] . ' ans</p>
        <p>Taille: ' . $animal["taille"] . ' cm</p>
        <p>Poids: ' . $animal["poids"] . ' Kg</p>
        <button type="button" class="btn btn-primary">Réserver</button>
      </div>
    </div>';
}
      ?>

</div>


<?php include "footer.php"; ?>
    
</body>
</html>

