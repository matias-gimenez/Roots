<?php
	include '../conexion.php';

	$oper = $_POST['oper'];
	$id = $_POST['id'];
	$idcodificador = $_POST['idcodificador'];
	$descripcion = $_POST['descripcion'];
	$habilitado = $_POST['habilitado'];
	

    $query = "CALL grabardatoscodificadores('".$oper."',".$id.",".$idcodificador.",'".$descripcion."','".$habilitado."')";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($datos,MYSQL_ASSOC);
	$id = $row['nid'];
	$msg_error = $row['msg_error'];
?>

<input type="hidden" id="msg_error" value="<?= $msg_error;?>">
<input type="hidden" id="new_idcodificador" value="<?= $id;?>">