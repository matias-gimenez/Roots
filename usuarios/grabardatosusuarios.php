<?php
	include '../conexion.php';

	$oper = $_POST['oper'];
	$idusuario = $_POST['idusuario'];
	$apellido = $_POST['apellido'];
	$nombres = $_POST['nombres'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hab = $_POST['hab'];
	$nivel = $_POST['nivel'];


    $query = "CALL grabardatosusuarios('".$oper."',".$idusuario.",'".$apellido."','".$nombres."','".$email."','".$password."',".$hab.",".$nivel.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($datos,MYSQL_ASSOC);
	$idusuario = $row['idusuario'];
	$msg_error = $row['msg_error'];
?>

<input type="hidden" id="msg_error" value="<?= $msg_error;?>">
<input type="hidden" id="new_idusuario" value="<?= $idusuario;?>">