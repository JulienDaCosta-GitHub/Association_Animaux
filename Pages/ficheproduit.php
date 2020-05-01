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
                echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/' . $filename . '" alt="Avatar"></div>';

            }
            elseif ($type_animal==='chat' || $type_animal==='Chat')
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
            <p>Un indispensable pour votre <?php echo $type_animal ?>!
            </p>
        </div>

    </div>
</div>
</body>
</html>