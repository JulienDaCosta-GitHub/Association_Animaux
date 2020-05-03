<?php
require_once('header.php');

require_once('../Admin/Config/Crud.php');

$crud = new Crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM produit WHERE id=$id");

foreach ($result as $res) {

    $nom = $res['nom'];
    $type_animal = $res['type_animal'];
    $prix = $res['prix'];
    $stock = $res['stock'];
    $filename = $res['image'];
}

/*Si on valide la quantité du produit alors la valeurs entrée est enregistrée dan sla session*/
if(isset($_POST['ajouter']))
{
    $_SESSION['form']['quantite']=$_POST['quantite'];


}
?>
<div class="d-flex">

    <div class="w-50 ">
        <?php
        if ($type_animal=='chien' || $type_animal =='Chien')
        {
            echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chien/Produit/' . $filename . '" alt="Avatar"></div>';

        }
        elseif ($type_animal==='chat' || $type_animal==='Chat')
        {

            echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Chat/Produit/' . $filename . '" alt="Avatar"></div>';

        }
        else
        {
            echo ' <div class="cadre"><img class="img_card" src="../Admin/miniature/Produit/' . $filename . '" alt="Avatar"></div>';



        }
        ?>

    </div>

    <div class="w-25">
        <form class="text-center border border-light p-5" action="" method="post" name="form">
            <input class="form-control mb-4" placeholder="Choisissez la quantité" type="text" name="quantite"/>
            <button class="btn btn-dark" name="ajouter">Confirmer</button>
        </form>
    </div>
    <?php echo "<a href='panier.php?id=$res[ID]'><button class='btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect' style='margin-top: 40vh' id='remove'>Voir Panier</button></a>"; ?>

</div>




