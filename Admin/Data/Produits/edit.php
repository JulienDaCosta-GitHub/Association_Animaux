<?php
// including the database connection file

require_once('../../Config/Crud.php');
require_once ('../../Config/Validation.php');


$crud = new Crud();
$validation = new Validation();

/*Gestion d'image EXTENSION*/
function getExtension($str)
{

    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

if(isset($_POST['update']))
{


    /*__________________________Gestion d'image_____________________________________________________*/


    define ("MAX_SIZE",	"400");
    $errors	=	0;
    $filename		=	$_FILES["file"]["name"];
    $uploadedfile 	= 	$_FILES['file']['tmp_name'];
    $type_file 		= $_FILES['file']['type'];
    if ($filename)
    {
        if( !is_uploaded_file($uploadedfile) )
        {
            exit("Le fichier est introuvable");
        }
        // on vérifie maintenant l'extension
        elseif( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
        {
            exit("Le fichier n'est pas une image");
        }
        else
        {

            $size		=	filesize($_FILES['file']['tmp_name']);
            if ($size > MAX_SIZE*1024)
            {
                exit ("verifier la taille de votre image!!");
                $errors=1;
            }
            $extension 	= 	getExtension($filename);
            $extension 	= 	strtolower($extension);
            if($extension=="jpg" || $extension=="jpeg" )
            {
                $uploadedfile 	= 	$_FILES['file']['tmp_name'];
                $src 			= 	imagecreatefromjpeg($uploadedfile);
            }
            else if($extension=="png")
            {
                $uploadedfile 	= 	$_FILES['file']['tmp_name'];
                $src 			= 	imagecreatefrompng($uploadedfile);
            }
            else
                $src 	= 	imagecreatefromgif($uploadedfile);

            list($width,$height)	=	getimagesize($uploadedfile);

            $newwidth	=	60;
            $newheight	=	($height/$width)*$newwidth;
            $tmp		=	imagecreatetruecolor($newwidth,$newheight);

            $newwidth1	=	25;
            $newheight1	=	($height/$width)*$newwidth1;
            $tmp1		=	imagecreatetruecolor($newwidth1,$newheight1);

            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);

            /*$filename 	= 	"". $_FILES['file']['name'];
            $filename1 	= 	"small". $_FILES['file']['name'];
            */

            /* imagejpeg($tmp,$filename,100);
             imagejpeg($tmp1,$filename1,100);*/

            imagedestroy($src);
            imagedestroy($tmp);
            imagedestroy($tmp1);

            move_uploaded_file($_FILES['file']['tmp_name'], '../../miniature/' .basename($_FILES['file']['name']));

            /* echo "miniature: <img src='{$filename1}'/><br/><br/>";
             echo "image originale: <img src='{$filename}'/>";
            */
        }
    }
    /*____________________________________________________________________________________________________________________________*/





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
        $result = $crud->execute("UPDATE produit SET nom='$nom',type_animal='$type_animal',prix='$prix', stock='$stock', image='$filename' WHERE id=$id");

        //redirectig to the display page. In our case, it is index.php
        header("Location: ../../Views/index.php");
    }
}
?>