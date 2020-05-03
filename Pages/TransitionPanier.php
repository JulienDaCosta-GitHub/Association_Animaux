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

<form action="" method="post" name="form">
    <input type="text" name="quantite"/>
    <button class="btn btn-dark" name="ajouter">Confirmer</button>
</form>

<?php echo "<a href='panier.php?id=$res[ID]'><button class='btn btn-dark' id='remove'>Voir Panier</button></a>"; ?>
