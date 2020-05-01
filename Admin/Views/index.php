<?php
//including the database connection file

require_once('../Config/Crud.php') ;

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM animal ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;

//fetching data in descending order (lastest entry first)
$quer = "SELECT * FROM produit ORDER BY id DESC";
$resulte = $crud->getData($quer);
//echo '<pre>'; print_r($result); exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css"/>
</head>



<body>

<!-- DIV CONTAINER ANIMAUX  ________________________-->
<div class="container  mt-3">
    <h3 class="text-center mt-4 mb-4">Animaux</h3>
    <div class="row ">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Image</th>

                <th>Nom</th>
                <th>Type</th>
                <th>Race</th>
                <th>Taille</th>
                <th>Poids</th>
                <th>age</th>
                <th>Action</th>

                <!-- Boucle foreach pour les boutonds tans q'uil y'a des produits ajouter un bouton -->


            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($result as $key => $res) {
                //while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='w-25'> <img class='w-50' src='../miniature/".$res['chemin']."'/></td>";

                echo "<td>".$res['nom']."</td>";
                echo "<td>".$res['type']."</td>";
                echo "<td>".$res['race']."</td>";
                echo "<td>".$res['taille']."</td>";
                echo "<td>".$res['poids']."</td>";
                echo "<td>".$res['age']."</td>";
                echo "<td><a href=\"Animaux/edit.php?id=$res[ID]\"><button class='btn btn-dark'>Modifier</button></a> <a href=\"../Data/Animaux/delete.php?id=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='btn btn-dark'>Supprimer</button></a></td>";
            }
            ?>
            </tbody>
        </table>
        <a href="Animaux/Add.php"><button type="button" class="btn btn-outline-success">Ajouter</button></a>

    </div>

    <!-- _____________________DIV CONTAINER PRODUITS ------------>

    <div class="container  mt-3">
        <h3 class="text-center mt-4 mb-4">Produits</h3>
        <div class="row ">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Image</th>

                    <th>Nom</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Action</th>

                    <!-- Boucle foreach pour les boutonds tans q'uil y'a des produits ajouter un bouton -->


                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($resulte as $key => $re) {
                    //while($res = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td class='w-25'> <img class='w-50' src='../miniature/".$re['chemin']."'/></td>";
                    echo "<td>".$re['nom']."</td>";
                    echo "<td>".$re['type_animal']."</td>";
                    echo "<td>".$re['prix']."</td>";
                    echo "<td>".$re['stock']."</td>";
                    echo "<td><a href=\"Produits/edit.php?id=$re[ID]\"><button class='btn btn-dark'>Modifier</button></a> <a href=\"../Data/Produits/delete.php?id=$re[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='btn btn-dark'>Supprimmer</button></a></td>";
                }
                ?>
                </tbody>
            </table>
            <a href="Produits/Add.php"><button type="button" class="btn btn-outline-success">Ajouter</button></a>

        </div>


</body>
<script>
    function popUP() {
        var element = document.getElementById("invisible");
        element.classList.remove("invisible");
    }
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
