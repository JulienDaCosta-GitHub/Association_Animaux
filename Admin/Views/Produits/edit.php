<?php
// including the database connection file
require_once('../../Config/Crud.php');

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
    $filename = $res['chemin'];

}

//fetching data in descending order (lastest entry first) || On récupère ces données pour le champ type du form
$quer = "SELECT * FROM animal ORDER BY id DESC";
$resulte = $crud->getData($quer);
//echo '<pre>'; print_r($result); exit;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>

<div class="row col-sm-6">

    <form class="text-center border border-light p-5" name="form1" method="post" action="../../Data/Produits/edit.php" enctype="multipart/form-data">
        <p class="h4 mb-4">Modifier</p>

        <p>Join our mailing list. We write rarely, but only the best content.</p>

        <p>
            <a href="" target="_blank">See the last newsletter</a>
        </p>

        <input id="defaultSubscriptionFormPassword" class="form-control mb-4" type="text" name="nom" value="<?php echo $nom;?>">

        <select class="mdb-select form-control mb-4" class="form-control mb-4" name="type_animal">
            <option value="" disabled>Veuillez choisir un type</option>

            <?php
            foreach ($resulte as $key => $res) {

                echo "<option value=\"1\"  selected>".$res['type']."</option>";

            }
            ?>
        </select>


        <input id="defaultSubscriptionFormPassword" class="form-control mb-4" type="text" name="prix" value="<?php echo $prix;?>">


        <input id="defaultSubscriptionFormPassword" class="form-control mb-4" type="text" name="stock" value="<?php echo $stock;?>">

        <!-- INPUT FILES-->
        <input class="form-control-file" id="exampleFormControlFile1" type="file" name="file" size="30" value="<?php echo $filename?>">



        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <input class="btn btn-info btn-block" type="submit" name="update" value="Update">

    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>