<?php include "header.php"; ?>
<?php
require_once('../Admin/Config/Crud.php');
require_once ('../Admin/Config/Config.php');
require_once('../Admin/Config/Validation.php');

?>


<?php

/*$bdd= new PDO('mysql:host=localhost;port=8889;dbname=association_animaux;charsert=utf8','root','root');
if(!$bdd)
{
    die(' Please Check Your Connection'.mysqli_error($bdd));
}
*/

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

/*Calcul du montant à payer */
$total = $prix*$_SESSION['form']['quantite'] ;



/*Insertion à la bdd si l'user paie le panier*/

$validation = new Validation();

if(isset($_POST['payer'])) {

    $commande_id = rand() ;
    $quantite = $_SESSION['form']['quantite'] ;
    $montant = $total ;
    $id_produit = $crud->escape_string($_GET['id']);

    $msg = $validation->check_empty($_GET, array('id'));



    if($msg != null) {
        echo $msg;
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";


    }
    else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = $crud->execute("INSERT INTO lignecommande(commande_ID,produit_ID,quantite,montant) VALUES('$commande_id','$id_produit','$quantite', '$montant')");

        //display success message
        header("Location: paiement.php");
    }
}
?>






    <body>

    <h1 class="center-text" style="font-size:60px">Panier</h1><br><br>



    <div style="clear: both"></div>

    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Produit(s)</th>
                        <th class="text-center">Prix</th>
                        <th class="center-text">Quantité</th>
                        <th></th>
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
                                                    <h4 class="media-heading"><a href="#"><?php echo $nom?></a></h4>
                                                </div>
                                        </div>
                                    </td>
                                    <!-- recuperation du prix du produit -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong><?php echo $prix ?></strong>
                                    </td>
                                     <!-- calcule du prix total -->
                                    <td class="col-sm-1 col-md-1 text-center">
                                        <strong><?php echo $_SESSION['form']['quantite']?></strong>
                                    </td>

                                    

                    </tr>




                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>  </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right">
                            <h3>
                                <strong><?php echo $total ?> €

                                </strong>
                            </h3>
                        </td>
                    </tr>
                    <td><a href="produits.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Reprendre l'achat</a></td>
                    <td></td>
                    <td></td>
                    <form class="form-group" action="" method="post">
                    <?php echo "<td><button  class='btn btn-success btn-block' name='payer'>Payer</i></button></td>" ; ?>
                        <!-- paiement.php?id=$res[ID]-->
                    </form>


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