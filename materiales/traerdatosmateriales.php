<?php
	
	include '../conexion.php';
	$idmateriales = $_POST['idmateriales'];

    $query = "CALL traerdatosmateriales(".$idmateriales.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));
?>

<script>

$(document).ready(function(){

});
</script>

<? $row = mysqli_fetch_array($datos,MYSQL_ASSOC);
$id = $row['id'];
$nombre = $row['nombre'];
$color = $row['color'];
$codtipo= $row['codtipo'];

include 'abm_materiales.php';?>

