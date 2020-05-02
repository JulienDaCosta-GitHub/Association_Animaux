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
    <?php require_once('../../nav.inc.php'); ?>
</header>

<br/><br/>
<div class="row col-sm-6">
    <form class="text-center border border-light p-5" action="../../Data/Animaux/Add.php" method="post" name="form1" enctype="multipart/form-data">
        <p class="h4 mb-4">Ajout Animal</p>

        <p>Join our mailing list. We write rarely, but only the best content.</p>

        <p>
            <a href="" target="_blank">See the last newsletter</a>
        </p>


        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="nom" placeholder="Nom">

        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="type" placeholder="Type">

        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="race" placeholder="Race">

        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="taille" placeholder="Taille">

        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="poids" placeholder="Poids">

        <input class="form-control mb-4" id="defaultSubscriptionFormPassword" type="text" name="age" placeholder="Âge">
        <!-- Input image -->
        <input class="form-control-file" id="exampleFormControlFile1" type="file" name="file" size="30">


        <input class="btn btn-info btn-block" type="submit" name="Submit" value="Add">

    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>