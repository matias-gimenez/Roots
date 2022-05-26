<?php

	include '../conexion.php';

	$oper = $_POST['oper'];
	$idmateriales = $_POST['idmateriales'];
	$nombre = $_POST['nombre'];
	$color = $_POST['color'];
	$codtipo = $_POST['codtipo'];

    $query = "CALL grabardatosmateriales('".$oper."',".$idmateriales.",'".$nombre."','".$color."',".$codtipo.")";
	
	// UPDATE

   //echo $query;


	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($datos,MYSQL_ASSOC);
	$idmateriales = $row['idmateriales'];
	$msg_error = $row ['msg_error'];
?>

<input type="hidden" id="msg_error" value="<?= $msg_error;?>">
<input type="hidden" id="new_idmateriales" value="<?= $idmateriales;?>">