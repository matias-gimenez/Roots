
<?php
	include '../conexion.php';

	$oper = $_POST['oper'];
	$idarticulos = $_POST['idarticulos'];
	$nombre = $_POST['nombre'];
	$cod_rubro = $_POST['cod_rubro'];
	$cod_materiales = $_POST['cod_materiales'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];


    $query = "CALL grabardatosarticulos('".$oper."',".$idarticulos.",'".$nombre."',".$cod_rubro.",".$cod_materiales.",".$precio;
	$query = $query.",".$stock.")";
	// UPDATE

   //echo $query;


	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($datos,MYSQL_ASSOC);
	$idarticulos = $row['idarticulos'];
	$msg_error = $row ['msg_error'];
?>

<input type="hidden" id="msg_error" value="<?= $msg_error;?>">
<input type="hidden" id="new_idarticulos" value="<?= $idarticulos;?>">