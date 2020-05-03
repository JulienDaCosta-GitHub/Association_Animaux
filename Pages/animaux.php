<?php include "header.php"; ?>



<?php
//including the database connection file

require_once('../Admin/Config/Crud.php') ;

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM animal ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

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
  foreach  ($result as $key => $res) {
      echo '<div class="card">' ;

        /*Condition

        Si l'animal est de type chien alors récupérer l'image dans le dossier corespondant miniature/Chien
        Si l'animal est de ty pe chat alors récupérer l'imafe dans le dossier correspondant miniature/Chat

        */
      if ($res['type']=='chien' || $res['type'] =='Chien')
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/' . $res["image"] . '" alt="Avatar"></div>';

      }
      elseif ($res['type']==='chat' || $res['type']==='Chat')
      {

          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/' . $res["image"] . '" alt="Avatar"></div>';



      }
      else
      {
          echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/' . $res["image"] . '" alt="Avatar"></div>';



      }

  echo    '

      <div class="card_container">
    
        <h4 class="title_card"><b>' . $res["nom"] . '</b></h4>
        <p>Type: ' . $res["type"] . '</p>
        <p>Race: ' . $res["race"] . '</p>
        <p>Age: ' . $res["age"] . ' ans</p>
        <p>Taille: ' . $res["taille"] . ' cm</p>
        <p>Poids: ' . $res["poids"] . ' Kg</p>
        <div class="d-flex justify-content-sm-between"
        >
        <!--button type="button" class="btn btn-dark">Réserver</button>
         <button type="button" class="btn btn-dark">Voir</button-->';
     echo "<a href=\"ficheanimal.php?id=$res[ID]\"><button class='btn btn-dark'>voir</button></a>";


    echo '    
        </div>

      </div>
    </div>';
}
      ?>

</div>


</body>

<?php include "footer.php"; ?>