
<?php
session_start();
require_once('../Admin/Config/init.php');?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Les Amis Des Animaux</title>
  </head>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="accueil.php"><i class="fa fa-home"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">

            <div> <!-- boutons gauche -->
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link active" href="accueil.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="animaux.php">Les animaux</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="produits.php">Les produits</span></a>
                    </li>

                    <?php if( userConnect() ) : ?>
                    <li class="nav-item active">





                    <?php if( adminConnect() ) : ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="../Admin/Views/index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestion des tâches
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../Admin/Views/index.php">Tableaux</a>
                                <a class="dropdown-item" href="../Admin/Views/Animaux/Add.php">Ajouter un animal</a>
                                <a class="dropdown-item" href="../Admin/Views/Produits/Add.php">Ajouter un produit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>

                    <?php endif; ?>

                </ul>


            </div>

            <div class="ml-auto"> <!-- boutons droite -->
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link nav" href="deconnexion.php?logout">Déconnexion</a>
                    </li>

                    <li> <!-- logo panier cliquable -->
                        <a class="nav-link active" href="panier.php"><i class="fa fa-shopping-basket"></i></a>
                    </li>

                </ul>
            </div>
            <?php else : ?>


        </div>

        <div class="ml-auto"> <!-- boutons droite -->
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link nav" href="connexion.php">Connexion</a>
                </li>

                <li> <!-- logo panier cliquable -->
                    <a class="nav-link active" href="panier.php"><i class="fa fa-shopping-basket"></i></a>
                </li>
            </ul>
        </div>
        <?php endif; ?>



        </div>
    </nav>
<br>
