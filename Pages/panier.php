<?php include "header.php"; ?>

<?php

$bdd= new PDO('mysql:host=localhost;port=8889;dbname=association_animaux;charsert=utf8','root','root');
if(!$bdd)
{
    die(' Please Check Your Connection'.mysqli_error($bdd));
}


$produits =  $bdd->query('SELECT * FROM produit');
$commande = $bdd->query('SELECT * FROM commande');
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
                        <th class="text-center">Prix</th>
                        <th class="center-text">Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($produits as $produit)
                            echo '
                        
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#">
                                                <!-- img -->
                                                <div class="media-body">
                                                    <!-- recuperation du nom du produit -->
                                                    <h4 class="media-heading"><a href="#">'. $produit["nom"].'</a></h4>
                                                </div>
                                        </div>
                                    </td>
                                    <!-- recuperation du prix du produit -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong>'. $produit["prix"].'</strong>
                                    </td>
                                     <!-- calcule du prix total -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong>'. $produit["stock"].'</strong>
                                    </td>
                                    

                    </tr>

                    '

                        ?>
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




    </table>

    </div>



    </body>

<?php include "footer.php"; ?>