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
    
     <!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-50" src="IMG/chien1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="IMG/chat2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="IMG/poney3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="IMG/shiba4.jpg" alt="Fourth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="IMG/chat5.jpg" alt="Fifth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>

</body>
</html>

