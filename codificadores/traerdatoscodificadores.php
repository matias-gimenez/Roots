<?php
	include '../conexion.php';
	$id = $_POST['id'];
	$idcodificador = $_POST['idcodificador'];

    $query = "CALL traerdatoscodificadores(".$id.",".$idcodificador.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));
?>

<script>
$(document).ready(function(){


});
</script>

<? $row = mysqli_fetch_array($datos,MYSQL_ASSOC);

$id = $row['id'];
$idcodificador = $row['idcodificador'];
$descripcion = $row['descripcion'];
$habilitado = $row['habilitado'];

include 'abm_codificadores.php';?>

