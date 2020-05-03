

<?php
/*$bdd= new PDO('mysql:host=localhost;dbname=association_animaux;charsert=utf8','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

     
if (isset ($_POST['don'])){
   $sth = $bdd->prepare("INSERT INTO don (montant) VALUES(?)");
   $sth->execute(array($_POST['montant']));
}*/

?>


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

<body><br>

<h1 class="center-text title"><b>Les amis des animaux</b></h1><br><br>

    <!-- carousel -->

<div class="row w-100">
  <div class="offset-3 col-7">  
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
          <img class="d-block" src="IMG/chien1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="IMG/chat2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="IMG/poney3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="IMG/shiba4.jpg" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block" src="IMG/chat5.jpg" alt="Fifth slide">
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
    </div>
  </div>  
</div>  <br><br><br>

 <!-- Animation du texte -->
<div id="animetexte">
  Adoptez 
  <div class="dropping-texts">
    <div>un chien</div>
    <div>un chat</div>
    <div>DES ANIMAUX !</div>
  </div>
</div><br><br>

<h3 class="h3"><b>Les amis des animaux</b> est une association qui vient en aide aux animaux<br> dont les propriétaires n'ont plus les moyens d'assurer leur bien-être,
    <br> qui sont laissés à l'abandon ou qui étaient maltraités.</h3>

<div class="row blockContent w-100">
  <div class="col-4">
    <img id="doggo1" src="IMG/chienaccueil1.jpg">
  </div>
  <div class="col-6">
    <p id="paragraphe1">Martinus agens illas provincias pro praefectis aerumnas 
      innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: 
      ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.</p>
  </div>
</div>

<div class="row blockContent w-100">
  <div class="col-6">
    <p id="paragraphe2">Martinus agens illas provincias pro praefectis aerumnas 
      innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: 
      ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.</p>
  </div>
  <div class="col-4">
    <img id="doggo2" src="IMG/chienaccueil2.jpg">
  </div>
</div>

<!--__________________________CAROUSSEL DES CARDS PRODUIT_________________________-->
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
      echo "<a href=\"ficheproduit.php?id=$res[ID]\"><button class='btn btn-dark'>voir</button></a>";
      echo ' </div>
    </div>';
  }
      ?>

</div>


<!--don-_____________________________________________________-->
<?php if( userConnect() ) : ?>

<div id="don">
    <h2>FAITES UN DON POUR SOUTENIR LES ANIMAUX</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Pourquoi faire un don?</h1>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate purus lorem, non viverra ipsum bibendum vel.
              Etiam et lacinia leo, nec eleifend tortor. Vivamus aliquam libero non fringilla efficitur. Nulla nec pellentesque ante.
               Mauris quis commodo ligula. Donec commodo ex vitae ligula eleifend, at iaculis arcu pulvinar. Pellentesque vehicula ex.</p>

            </form>
        </div>
        <div class="form-container sign-in-container">
            <form form action="#" method="POST">
                <h1>Faire un don!</h1>
                <br/><br/>
             <input type="text"  name="montant" placeholder="Combien voulez vous donner?" title="Veuillez entrer des chiffres" required pattern="[0-9]"/><br/>
             <button class="log-in" type="submit" name="don">Ajouter au panier</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-left">
                    <h2>Faire un don maintenant!</h2>
                    <p>Venez en aide aux animaux</p>
                    <button class="ghost" id="signIn">faire un don</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h2>A quoi servirons les dons?</h2>
                <p>nos objectifs et convictions</p>
                    <button class="ghost" id="signUp">En savoir plus</button>
                </div>
            </div>
        </div>
</div>
    <?php endif; ?>


<script src="JS/SCRIPT.js"></script>
</body>
</div>

</body>

<?php include "footer.php"; ?>