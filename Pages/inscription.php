<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>form</title>
  <link rel="stylesheet" href="CSS/login_inscription.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>


<?php

//connexion bdd
try{
    $bdd= new PDO('mysql:host=localhost;dbname=association_animaux;charsert=utf8','root','root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
//en cas d'echec
catch(Exeption $e)
{
    die('Error: '.$e->getMessage());
}
//lier form a bdd
if(isset($_POST['inscription'])){
    if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['adresse'])&& !empty($_POST['ville'])&& !empty($_POST['ville'])&& !empty($_POST['cp'])&& !empty($_POST['mail'])&& !empty($_POST['mail'])&& !empty($_POST['telephone'])){
    

    $insertsql=$bdd->prepare('INSERT INTO user(nom, prenom, mdp, adresse, ville, cp, mail, telephone) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $insertsql->execute(array($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['adresse'],$_POST['ville'],$_POST['cp'],$_POST['mail'],$_POST['telephone']));
}
}

?>

<!-- form -->

   <div class="overlay">

   <form action="" method="POST">
      
         <div class="con">
       
         <header class="head-form">
            <h2>Inscription</h2>
          
         </header>

         <br>
         <div class="field-set">
    
            <!--user name -->
            <span class="input-item">
               <i class="fa fa-user-circle"></i>
            </span>
             <input class="form-input" id="txt-input" type="text"  name="nom" placeholder="nom" required>
            <br>

             <!--user prenom -->
             <span class="input-item">
               <i class="fa fa-user-circle"></i>
             </span>
             <input class="form-input" id="txt-input" type="text"  name="prenom" placeholder="prenom" required>
            <br>
             <!--user adresse -->
             <span class="input-item">
               <i class="fa fa-home"></i>
             </span>
            <input class="form-input" id="txt-input" type="text"  name="adresse" placeholder="votre adresse" required>
            <br>

             <!--user ville -->
            <span class="input-item">
               <i class="fa fa-map"></i>
            </span>
            <input class="form-input" id="txt-input" type="text"  name="ville" placeholder="votre ville" required>
            <br>

             <!--user cp -->
            <span class="input-item">
               <i class="fa fa-home"></i>
            </span>
            <input class="form-input" id="txt-input" type="number"  name="cp" placeholder="votre code postale" required minlength="5" maxlength="5">
            <br>

             <!--user mail -->
            <span class="input-item">
               <i class="fa fa-at"></i>
            </span>
            <input class="form-input" id="txt-input" type="email"  name="mail" placeholder="votre email gmail" required pattern=".+@gmail.com">
            <br>

            <!--user telephone -->
            <span class="input-item">
               <i class="fa fa-phone"></i>
            </span>
            <input class="form-input" id="txt-input" type="tel"  name="telephone" placeholder="telephone" required  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
            <br>
            <!--user mdp-->
    
            <span class="input-item">
              <i class="fa fa-key"></i>
             </span>
            <input class="form-input" type="password" placeholder="mot de passe" id="mdp"  name="mdp" required>
               <!--montrer cacher mdp-->
                  <span>
                     <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                  </span>
            <br>

            <br>
                  <!--buttons -->
                  <!--button inscription -->

                        <button class="log-in"  type="submit" name="inscription">s'inscrire</button>
                     </div>
               
                  <!--  autres buttons -->
                     <div class="other">
                  <!--mot de passe oublié-->
                        <button class="btn submits frgt-pass">mot de passe oublié</button>
                  <!--lien connexion-->
                        <button class="btn submits sign-up"><a href="connexion.php">connexion</a> 
                  <!--icon connexion -->
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </button>
                  <!--fin class other-->
                     </div>
       <!--fin con-->               
        </div>
       <!--fin form-->
      </form>
       <!--fin overlay-->
      </div>
      <script src="JS/mdp.js"></script>
</body>


</html>


