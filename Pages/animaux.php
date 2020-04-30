<?php include "header.php"; ?>

<?php
require_once('../Admin/Config/Crud.php') ;

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM animal ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>

<body>
<div class="container d-flex flex-wrap  ">
<?php
foreach ($result as $key => $res) {

}
?>
</div>

</body>




<?php include "footer.php"; ?>