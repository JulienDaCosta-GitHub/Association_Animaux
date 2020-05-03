<?php

//connexion bdd
try{

    //$bdd= new PDO('mysql:host=localhost;dbname=association_animaux;charsert=utf8','root','root');

    $bdd= new PDO('mysql:host=localhost;port=8889;dbname=association_animaux;charsert=utf8','root','root');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
//en cas d'echec
catch(Exeption $e)
{
    die('Error: '.$e->getMessage());
}
//lier form a bdd
if(isset($_POST['inscription'])){


    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['ville']);
    $cp = htmlspecialchars($_POST['cp']);
    $mail = htmlspecialchars($_POST['mail']);
    $tel = htmlspecialchars($_POST['telephone']);


    $mdp = trim($_POST['mdp']);
    $mdp2 = trim($_POST['mdp2']);

    if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['adresse'])&& !empty($_POST['ville'])&& !empty($_POST['ville'])&& !empty($_POST['cp'])&& !empty($_POST['mail'])&& !empty($_POST['mail'])&& !empty($_POST['telephone'])){
        //mail verifier si utilité ou non

        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                //mdp si non egal
                if($mdp == $mdp2) {


                    $mdp = crypt($mdp, "$6$rounds=5000$AZIREHsdfd3348349fferrreAEI34ZZE4343435ERereerer343546ERedfdT45452eRRTR45$");

                    $insertsql=$bdd->prepare('INSERT INTO user(nom, prenom, mdp, adresse, ville, cp, mail, telephone) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                    //$insertsql->execute(array($_POST['nom'],$_POST['prenom'],$mdp ,$_POST['adresse'],$_POST['ville'],$_POST['cp'], $mail,$_POST['telephone']));
                    $insertsql->execute(array($nom, $prenom, $mdp, $adresse, $ville, $cp,$mail, $tel));
                    $_SESSION['comptecree'] = "Votre compte a bien été créé !";
                    header('Location:connexion.php');
                    exit;

                } else {
                    $message = "code érronné";
                }
            } else {
                $message = "Adresse mail déjà utilisée !";
            }
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

<!-- form -->

<div class="overlay">

    <form action="" method="POST">

        <div class="con">

            <div class="header-form">
                <h2>Inscription</h2>

            </div>

            <br>
            <div class="field-set">

                <!--user name -->
                <span class="input-item">
               <i class="fa fa-user-circle"></i>
            </span>
                <input class="form-input" id="txt-input" type="text" name="nom" placeholder="nom" title="Uniquement majuscule et minuscule autorisé." required pattern="[a-zA-Z_.-]*" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                <br>

                <!--user prenom -->
                <span class="input-item">
               <i class="fa fa-user-circle"></i>
             </span>
                <input class="form-input" id="txt-input" type="text" name="prenom" placeholder="prenom" title="Uniquement majuscule et minuscule autorisé." required pattern="[a-zA-Z_.-]*" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                <br>
                <!--user adresse -->
                <span class="input-item">
               <i class="fa fa-home"></i>
             </span>
                <input class="form-input" id="txt-input" type="text" name="adresse" placeholder="votre adresse" required value="<?php if(isset($adresse)) { echo $adresse; } ?>" />
                <br>

                <!--user ville -->
                <span class="input-item">
               <i class="fa fa-map"></i>
            </span>
                <input class="form-input" id="txt-input" type="text" name="ville" placeholder="votre ville" required value="<?php if(isset($ville)) { echo $ville; } ?>" />
                <br>

                <!--user cp -->
                <span class="input-item">
               <i class="fa fa-home"></i>
            </span>
                <input class="form-input" id="txt-input" type="text" name="cp" placeholder="votre code postale" title="Veuillez entrer 5chiffres" required pattern="[0-9]{5}" value="<?php if(isset($cp)) { echo $cp; } ?>"/>
                <br>

                <!--user mail -->
                <span class="input-item">
               <i class="fa fa-at"></i>
            </span>
                <input class="form-input" id="txt-input" type="email" name="mail" placeholder="votre email gmail" title="Veullez entrer un mail valide" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                <br>

                <!--user telephone -->
                <span class="input-item">
               <i class="fa fa-phone"></i>
            </span>
                <input class="form-input" id="txt-input" type="tel" name="telephone" placeholder="telephone" title="Entrez un numero de telephone a 10chiffres" required pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="<?php if(isset($tel)) { echo $tel; } ?>" />
                <br>
                <!--user mdp-->

                <span class="input-item">
              <i class="fa fa-key"></i>
             </span>
                <input class="form-input" id="txt-input" type="password" placeholder="mot de passe" id="mdp" title="Seul les majuscules, minuscules et chiffres sont autorisés" name="mdp" required pattern="[0-9a-zA-Z_.-]*"/>
                <br>
                <span class="input-item">
              <i class="fa fa-key"></i>
             </span>
                <input class="form-input" id="txt-input" type="password" placeholder="mot de passe" id="mdp2" name="mdp2" title="Seul les majuscules, minuscules et chiffres sont autorisés" required pattern="[0-9a-zA-Z_.-]*"/>
                <br>
                <!-- message si inscription reussi -->
                <?php
                if(isset($message)) {
                    echo '<font color="red">'.$message."</font>";
                }
                ?>

                <br>
                <!--buttons -->
                <!--button inscription -->

                <button class="log-in" type="submit" name="inscription">s'inscrire</button>
            </div>

            <!-- autres buttons -->
            <div class="other">
                <!--mot de passe oublié-->
                <button class="btn submits frgt-pass">retour</button>
                <!--lien connexion-->
                <button class="btn submits switch"><a href="connexion.php">j'ai déjà un compte</a>
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