<?php
	include '../conexion.php';
	$idusuario = $_POST['idusuario'];

    $query = "CALL traerdatosusuarios(".$idusuario.",'')";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));
?>

<script>
$(document).ready(function(){


});
</script>

<? $row = mysqli_fetch_array($datos,MYSQL_ASSOC);
$id = $row['id'];
$apellido = $row['apellido'];
$nombres = $row['nombres'];
$email = $row['email'];
$habilitado = $row['habilitado'];
$password = $row['contrasenia'];
$perfil = $row['perfil'];

include 'abm_usuarios.php';?>

