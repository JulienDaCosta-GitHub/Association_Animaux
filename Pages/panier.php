<?php include "header.php"; ?>


<?php

session_start();
$bdd= new PDO('mysql:host=localhost;port=8889;dbname=association_animaux;charsert=utf8','root','root');
if(!$bdd)
{
    die(' Please Check Your Connection'.mysqli_error($bdd));
}


$produits =  $bdd->query('SELECT * FROM produit');
$lignecommande = $bdd->query('SELECT * FROM lignecommande');;
?>

    <body>

    <h1 class="center-text" style="font-size:60px">Mon panier</h1><br><br>
    <div style="clear: both"></div>

    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Produit(s)</th>
                            <th>Quantity</th>
                            <th class="text-center">Prix</th>
                            <th class="center-text">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#">
                                                <!-- img -->
                                                <div class="media-body">
                                                    <!-- recuperation du nom du produit -->
                                                    <h4 class="media-heading"><a>
                                                            <?php foreach ($produits as $produit) : echo $produit["nom"]; ?>
                                                        </a></h4>
                                                </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                         <input type="email" class="form-control" id="exampleInputEmail1" value="<?php foreach ($produits as $produit) :echo $produit["stock"]; ?>">

                                    </td>
                                    <!-- recuperation du prix du produit -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong><?php foreach ($produits as $produit) : echo $produit["prix"]; ?></strong>
                                    </td>
                                     <!-- calcule du prix total -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong><?php foreach ($produits as $produit) : echo $produit["prix"]; ?></strong>
                                    </td>
                                 <tr>
                    </tr>


                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right">
                            <h3>
                                <strong>€

                                </strong>
                            </h3>
                        </td>
                    </tr>
                    <td><a href="produits.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Reprendre l'achat</a></td>
                    <td></td>
                    <td></td>
                    <td><a href="paiement.php" class="btn btn-success btn-block">Payer</i></a></td>
                    </tr>

                    </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    </div>

    </body>

<?php include "footer.php"; ?>