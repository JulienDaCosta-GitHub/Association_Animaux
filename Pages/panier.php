<?php include "header.php"; ?>

<?php

session_start();
$bdd= new PDO('mysql:host=localhost;port=8889;dbname=association_animaux;charsert=utf8','root','root');
if(!$bdd)
{
    die(' Please Check Your Connection'.mysqli_error($bdd));
}


$produits =  $bdd->query('SELECT * FROM produit');
$commande = $bdd->query('SELECT * FROM commande');
// Prepare the SQL statement, we basically are checking if the product exists in our databaser
$stmt = $bdd->prepare('SELECT * FROM produit WHERE id = ?');
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
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#">
                                            <!-- img -->
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Product name</a></h4>
                                        </div>
                                    </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>€</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>€</strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Supprimer
                                    </button></td>
                            </tr>
                            <tr>
                                <td class="col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#">
                                            <!-- img -->
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">Product name</a></h4>
                                        </div>
                                    </div></td>
                                <td class="col-md-1" style="text-align: center">
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                                </td>
                                <td class="col-md-1 text-center"><strong>€</strong></td>
                                <td class="col-md-1 text-center"><strong>€</strong></td>
                                <td class="col-md-1">
                                    <button type="button" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Supprimer
                                    </button></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>€</strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        Reprendre
                                        <span class="glyphicon glyphicon-shopping-cart"></span>
                                    </button></td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Payer
                                        <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php

            if (!empty($_SESSION["cart"])){
                $total = 0;
                foreach ($_SESSION["cart"] as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["item_name"]; ?></td>
                        <td><?php echo $value["item_quantity"]; ?></td>
                        <td>€ <?php echo $value["product_price"]; ?></td>
                        <td>€ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                        <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($value["item_quantity"] * $value["product_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <th align="right">€ <?php echo number_format($total, 2); ?></th>
                    <td></td>
                </tr>

                <?php
            }
            ?>
        </table>

    </div>

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

    <div class="cart content-wrapper">
        <h1>Shopping Cart</h1>
        <form  method="post">
            <table>
                <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($produits)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td class="img">
                                <a href="index.php?page=product&id=<?=$produit['id']?>">
                                    <img src="imgs/<?=$produit['img']?>" width="50" height="50" alt="<?=$produit['nom']?>">
                                </a>
                            </td>
                            <td>
                                <a href="index.php?page=product&id=<?=$produit['id']?>"><?=$produit['nom']?></a>
                                <br>
                                <a href="index.php?page=cart&remove=<?=$produit['id']?>" class="remove">Remove</a>
                            </td>
                            <td class="price">&dollar;<?=$produit['price']?></td>
                            <td class="quantity">
                                <input type="number" name="quantity-<?=$produit['id']?>" value="<?=$produits_in_cart[$produit['id']]?>" min="1" max="<?=$produit['quantity']?>" placeholder="Quantity" required>
                            </td>
                            <td class="price">&dollar;<?=$produit['price'] * $produits_in_cart[$produit['id']]?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span class="text">Subtotal</span>
                <span class="price">&dollar;<?=$subtotal?></span>
            </div>
            <div class="buttons">
                <input type="submit" value="Update" name="update">
                <input type="submit" value="Place Order" name="placeorder">
            </div>
        </form>
    </div>


</body>

<?php include "footer.php"; ?>