<?php include "header.php"; ?><br>

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

</body>

<?php include "footer.php"; ?>