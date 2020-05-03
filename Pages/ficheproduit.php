<?php include "header.php"; ?>


<?php
// including the database connection file

require_once('../Admin/Config/Crud.php');

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM produit WHERE id=$id");

foreach ($result as $res) {

    $nom = $res['nom'];
    $type_animal = $res['type_animal'];
    $prix = $res['prix'];
    $stock = $res['stock'];
    $filename = $res['image'];
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
            if ($type_animal=='chien' || $type_animal =='Chien')
            {
                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/Produit/' . $filename . '" alt="Avatar"></div>';

            }
            elseif ($type_animal==='chat' || $type_animal==='Chat')
            {

                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/Produit/' . $filename . '" alt="Avatar"></div>';

            }
            else
            {
                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Produit/' . $filename . '" alt="Avatar"></div>';



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
            <p>Un indispensable pour votre <?php echo $type_animal ?>!
            </p>
            <?php if( userConnect() ) : ?>
            <?php echo "<a href='TransitionPanier.php?id=$res[ID]'><button class='btn btn-dark' id='remove'>Ajouter au panier</button></a>"; ?>
            <?php endif; ?>

        </div>

    </div>
</div>

<!-- Card -->
<!--div class="container">

    <div class="alert alert-info invisible" role="alert" id="el">

        <!-?php if( userConnect() ) : ?>



        <!-?php else : ?>

            <h4 class="alert-heading">Vous n'êtes pas connecté.e !</h4>
            <p>Créez un compte ou connetez vous pour pouvoir réserver un rendz-vous </p>
            <hr>
            <p class="mb-0"><a class="alert-link" href="connexion.php">Se connecter</a> | <a class="alert-link" href="inscription.php">S'inscrire</a></p>

        <!-?php endif; ?>
    </div>
</div -->
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