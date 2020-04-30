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
      echo '<div class="card">
      <div class="cadre"><img class="img_card" src="IMG/' . $animal["image"] . '" alt="Avatar"></div>
      <div class="card_container">
    
        <h4 class="title_card"><b>' . $animal["nom"] . '</b></h4>
        <p>Type: ' . $animal["type"] . '</p>
        <p>Race: ' . $animal["race"] . '</p>
        <p>Age: ' . $animal["age"] . ' ans</p>
        <p>Taille: ' . $animal["taille"] . ' cm</p>
        <p>Poids: ' . $animal["poids"] . ' Kg</p>
      </div>
    </div>';
}
      ?>

</div>


<?php include "footer.php"; ?>
    
</body>
</html>

