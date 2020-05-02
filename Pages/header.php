<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    <title>accueil</title>
</head>

<body>

    <!-- navbar -->

        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="accueil.php">Accueil<span class="sr-only">(current)</span></a>
                </li>

              <li class="nav-item">
                <a class="nav-link" href="animaux.php">Les animaux</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="inscription.php">Inscription</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="connexion.php">Connexion</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="panier.php">Panier</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="remerciement.php">Remerciements</a>
              </li>
            </ul>
      </div>

  <a class="navbar-brand" href="accueil.php"><i class="fa fa-home"></i></a>
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
            
    <div> <!-- boutons gauche -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="animaux.php">Les animaux</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="produits.php">Les produits</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php#don">Faire un don</a>
      </li>
    </ul>
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
      <a class="nav-link active" href="panier.php"><i class="fa fa-shopping-basket"><span>$num_items_in_cart</span></i></a>
      </li>
    </ul>
    </div>
    
  
  </div>

  </nav>
</body>
