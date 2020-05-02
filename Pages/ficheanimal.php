<?php include "header.php"; ?>

<?php
// including the database connection file

require_once('../Admin/Config/Crud.php');

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM animal WHERE id=$id");

foreach ($result as $res) {
    $id =['ID'];
    $nom = $res['nom'];
    $type = $res['type'];
    $race = $res['race'];
    $taille = $res['taille'];
    $poids = $res['poids'];
    $age = $res['age'];
    $filename = $res['image'];
}
?>

<?php
require_once ('../Admin/Config/Config.php');

require_once('../Admin/Config/Validation.php');
/*Déja appellé plus haut*/
/*require_once('../Admin/Config/Crud.php');*/

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['confirmer'])) {
   /* $userID = ;*/
    $animalID = $id;
    $dateTime = new DateTime();;


    $dateRdv = $crud->escape_string($_POST['date_rdv']);
    $msg = $validation->check_empty($_POST, array('date_rdv'));

    // checking empty fields
    if($msg != null) {
        echo $msg;
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = $crud->execute("INSERT INTO reservation(user_ID,animal_ID,datetime,date_rdv) VALUES('$nom','$type','$race', '$taille', '$poids', '$age', '$filename')");

        //display success message
        header("Location: ../../Views/index.php");
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="container">
        <!-- Card -->
        <div class="card testimonial-card">

            <!-- Background color -->
            <div class="card-up indigo lighten-1"></div>

            <!-- Avatar -->
            <div class="avatar mx-auto white">

            <?php
                if ($type=='chien' || $type =='Chien')
                {
                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/' . $filename . '" alt="Avatar"></div>';

                }
                elseif ($type==='chat' || $type==='Chat')
                {

                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/' . $filename . '" alt="Avatar"></div>';

                }
                else
                {
                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/' . $filename . '" alt="Avatar"></div>';



                }
                ?>
                <!--img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                     alt="woman avatar"-->
            </div>

            <!-- Content -->
            <div class="card-body">
                <!-- Name -->
                <h4 class="card-title"><?php echo $nom?></h4>

                <hr>
                <!-- Quotation -->
                <p><?php echo $nom?> est un animal de compagnie très affectueux qui se sent terriblement seul en cette periode difficle.s
                </p>
               <?php echo "<button  class='btn btn-dark' id='remove'>Réserver</button>";
               ?>
            </div>

        </div>
    </div>
    <!-- Card -->
<div class="container">

    <div class="alert alert-info invisible" role="alert" id="el">

        <?php if( userConnect() ) : ?>
        <h4 class="alert-heading">Vous y êtes presque !</h4>
        <p>Choisissez une date afin de rencontrer <?php echo $nom ?></p>
        <hr>
        <form class="form-group" action="" method="post">
            <input class="form-control w-25 mb-2" id="date" type="date" value="2020-05-02" name="date_rdv">
            <button class="btn btn-dark" name="confirmer">Confirmer</button>
        </form>

        <?php else : ?>

                <h4 class="alert-heading">Vous n'êtes pas connecté.e !</h4>
                <p>Créez un compte ou connetez vous pour pouvoir réserver un rendz-vous </p>
                <hr>
                <p class="mb-0"><a class="alert-link" href="connexion.php">Se connecter</a> | <a class="alert-link" href="inscription.php">S'inscrire</a></p>

        <?php endif; ?>
    </div>
</div>
</body>
<script type="text/javascript">
    remove.onclick = () => {
        const el = document.querySelector('#el');
        if (el.classList.contains("invisible")) {
            el.classList.remove("invisible");


        }
    }
</script>
</html>