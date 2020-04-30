<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file

require_once ('../../Config/Config.php');

require_once('../../Config/Validation.php');

require_once('../../Config/Crud.php');

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {


    $nom = $crud->escape_string($_POST['nom']);
    $type = $crud->escape_string($_POST['type']);
    $race = $crud->escape_string($_POST['race']);
    $taille = $crud->escape_string($_POST['taille']);
    $poids = $crud->escape_string($_POST['poids']);
    $age = $crud->escape_string($_POST['age']);



    $msg = $validation->check_empty($_POST, array('nom', 'type', 'race', 'taille', 'poids', 'age'));
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
        $result = $crud->execute("INSERT INTO animal(nom,type,race,taille,poids,age) VALUES('$nom','$type','$race', '$taille', '$poids', '$age')");

        //display success message
        header("Location: ../../Views/index.php");
    }
}
?>
</body>
</html>