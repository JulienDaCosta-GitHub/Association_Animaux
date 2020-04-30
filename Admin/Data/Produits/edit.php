<?php
// including the database connection file

require_once('../../Config/Crud.php');
require_once ('../../Config/Validation.php');


$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update']))
{
    $id = $crud->escape_string($_POST['id']);

    $nom = $crud->escape_string($_POST['nom']);
    $type_animal = $crud->escape_string($_POST['type_animal']);
    $prix = $crud->escape_string($_POST['prix']);
    $stock = $crud->escape_string($_POST['stock']);


    $msg = $validation->check_empty($_POST, array('nom', 'type_animal', 'prix', 'stock'));
   /* $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
   */

    // checking empty fields
    if($msg) {
        echo $msg;
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }  else {
        //updating the table
        $result = $crud->execute("UPDATE produit SET nom='$nom',type_animal='$type_animal',prix='$prix', stock='$stock' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: ../../Views/index.php");
    }
}
?>