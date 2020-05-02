<?php 
//connexion bdd


  /*$con=mysqli_connect('localhost','root','root','association_animaux', '8889');*/

session_start();
$bdd= new PDO('mysql:host=localhost;port=3308;dbname=association_animaux;charsert=utf8','root','');


//début de la session: verifier les données de mdp et nom
    if(isset($_POST['Login']))
    {
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = trim($_POST['mdp']);
//si nom mdp est vide
       if(empty($mail) || empty($mdp))
       {
       }
//si nom ou mdp correspond pas a ce qu'on a dans la bdd
       else
       {
            $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND mdp = ?");
            $requser->execute(array( $mail, crypt($mdp, "$6$rounds=5000$AZIREHsdfd3348349fferrreAEI34ZZE4343435ERereerer343546ERedfdT45452eRRTR45$")));
            $userexist = $requser->rowCount();
 // reussi else pas réussi
        if($userexist == 1)
            {
                $_SESSION['user']= $mail;
                header("location:accueil.php");
                exit;
            }
            else
            {
                header("location:connexion.php?Invalid= votre mot de passe ou nom n'est pas bon ");
            }
       }
    }
  
?>


<?php 
//connexion bdd
/*session_start();
$bdd= new PDO('mysql:host=localhost;dbname=association_animaux;charsert=utf8','root','root');
*/
 
//début de la session: verifier les données de mdp et nom
    if(isset($_POST['Login']))
    {
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = trim($_POST['mdp']);
//si nom mdp est vide
       if(empty($mail) || empty($mdp))
       {
       }
//si nom ou mdp correspond pas a ce qu'on a dans la bdd
       else
       {
            $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND mdp = ?");
            $requser->execute(array( $mail, crypt($mdp, "$6$rounds=5000$AZIREHsdfd3348349fferrreAEI34ZZE4343435ERereerer343546ERedfdT45452eRRTR45$")));
            $userexist = $requser->rowCount();
 // reussi else pas réussi
        if($userexist == 1)
            {
                $_SESSION['user']= $mail;
                header("location:accueil.php");
                exit;
            }
            else
            {
                header("location:connexion.php?Invalid= votre mot de passe ou nom n'est pas bon ");
                exit;
            }
       }
    }
  
?>


<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>form</title>
  <link rel="stylesheet" href="CSS/login_inscription.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>


<div class="overlay">

<form action="" method="POST">
   
      <div class="con">
    
      <div class="header-form">
         <h2>Connexion</h2>
       
</div>

      <br>
      <div class="field-set">
 
     
            <!--user name -->
                <span class="input-item">
                <i class="fa fa-user-circle"></i>
                </span>
                <input class="form-input" id="txt-input" type="email"  name="mail" placeholder="votre email gmail" title="Veullez entrer un mail valide" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
            <br>
            <!--user mdp -->
                <span class="input-item">
                <i class="fa fa-key"></i>
                </span>
                <input class="form-input" type="password" placeholder="mot de passe" id="mdp"  name="mdp" title="Seul les majuscules, minuscules et chiffres sont autorisés" name="mdp" required pattern="[0-9a-zA-Z_.-]*">
            <!--monter/cacher -->
            <span>
                <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
            </span>
            <br>
            <br>
            <!--message d'erreur si une information est invalide-->
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
            ?>
      
                  <!--buttons -->
                  <!--button login-->

                        <button class="log-in"  type="submit" name="Login"> se connecter </button>
                     </div>
               
                  <!--  autres buttons -->
                     <div class="other">
                  <!--mot de passe oublié-->
                        <button class="btn submits frgt-pass">mot de passe oublié</button>
                  <!--lien connexion-->
                  <button class="btn submits switch"><a href="inscription.php">inscription</a>
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