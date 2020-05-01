
<?php
//connexion bdd

<<<<<<< Updated upstream
$con = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con, 'association_animaux');

=======
  $con=mysqli_connect('localhost','root','root','association_animaux', '8889');
 
>>>>>>> Stashed changes
  if(!$con)
  {
      die(' Please Check Your Connection'.mysqli_error($con));
  }
  
//début de la session: verifier les données de mdp et nom
session_start();
    if(isset($_POST['Login']))
    {
//si nom mdp est vide
       if(empty($_POST['nom']) || empty($_POST['mdp']))
       {
       }
//si nom ou mdp correspond pas a ce qu'on a dans la bdd
       else
       {
            $query="select * from user where nom='".$_POST['nom']."' and mdp='".$_POST['mdp']."'";
            $result=mysqli_query($con,$query);
 // reussi else pas réussi
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['user']=$_POST['nom'];
                header("location:wellcome.php");
            }
            else
            {
                header("location:connexion.php?Invalid= votre mot de passe ou nom n'est pas bon ");
            }
       }
    }
  
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>form</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="CSS/login_inscription.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>


<div class="overlay">

<form action="" method="post">
   
      <div class="con">
    
      <header class="head-form">
         <h2>Connexion</h2>
       
      </header>

      <br>
      <div class="field-set">
 
     
            <!--user name -->
                <span class="input-item">
                <i class="fa fa-user-circle"></i>
                </span>
                <input class="form-input" id="txt-input" type="text" placeholder="nom" name="nom" required>
            <br>
            <!--user mdp -->
                <span class="input-item">
                <i class="fa fa-key"></i>
                </span>
                <input class="form-input" type="password" placeholder="mot de passe" id="mdp"  name="mdp" required>
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
                  <button class="btn submits sign-up"><a href="inscription.php">inscription</a> 
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