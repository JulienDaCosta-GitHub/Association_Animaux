<?php
// including the database connection file

require_once('../../Config/Crud.php');
require_once('../../Config/Validation.php');

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['update']))
{
    $id = $crud->escape_string($_POST['id']);

    $nom = $crud->escape_string($_POST['nom']);
    $type = $crud->escape_string($_POST['type']);
    $race = $crud->escape_string($_POST['race']);
    $taille = $crud->escape_string($_POST['taille']);
    $poids = $crud->escape_string($_POST['poids']);
    $age = $crud->escape_string($_POST['age']);

    $msg = $validation->check_empty($_POST, array('nom', 'type', 'race', 'taille', 'poids', 'age'));
  /*  $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
*/
    // checking empty fields
    if($msg) {
        echo $msg;
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }

    else {
        //updating the table
        $result = $crud->execute("UPDATE animal SET nom='$nom',type='$type',race='$race', taille='$taille',poids='$poids',age='$age' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: ../../Views/index.php");
    }
}
?>