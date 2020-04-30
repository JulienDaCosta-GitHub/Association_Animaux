
<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
require_once('../../Config/Crud.php') ;
require_once('../../Config/Validation.php');

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {
    $nom = $crud->escape_string($_POST['nom']);
    $type_animal = $crud->escape_string($_POST['type_animal']);
    $prix = $crud->escape_string($_POST['prix']);
    $stock = $crud->escape_string($_POST['stock']);


    $msg = $validation->check_empty($_POST, array('nom', 'type_animal', 'prix', 'stock'));
   /* $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
   */

    // checking empty fields
    if($msg != null) {
        echo $msg;
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = $crud->execute("INSERT INTO produit(nom,type_animal,prix, stock) VALUES('$nom','$type_animal','$prix', '$stock')");

        //display success message
        header("Location: ../../Views/index.php");

    }
}
?>
</body>
</html>