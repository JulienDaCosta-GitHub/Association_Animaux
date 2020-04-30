<?php
// including the database connection file

require_once('../../Config/Crud.php');

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM animal WHERE id=$id");

foreach ($result as $res) {
    $nom = $res['nom'];
    $type = $res['type'];
    $race = $res['race'];
    $taille = $res['taille'];
    $poids = $res['poids'];
    $age = $res['age'];
}
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
<header>
    <?php
    require_once('../../../Pages/header.php') ;

    ?>
</header>
<a href="../index.php">Home</a>
<br/><br/>
<div class="container row ">

    <form class="ext-center border border-light p-5" name="form1" method="post" action="../../Data/Animaux/edit.php">
        <p class="h4 mb-4">Modifier</p>
        <p>Join our mailing list. We write rarely, but only the best content.</p>

        <p>
            <a href="" target="_blank">See the last newsletter</a>
        </p>


            <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="nom" value="<?php echo $nom;?>">


            <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="type" value="<?php echo $type;?>">


           <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="race" value="<?php echo $race;?>">



             <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="taille" value="<?php echo $taille;?>">


             <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="poids" value="<?php echo $poids;?>">


             <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" name="age" value="<?php echo $age;?>">


                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input class="btn btn-info btn-block" type="submit" name="update" value="Update">


    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>