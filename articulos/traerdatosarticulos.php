<?php
	include '../conexion.php';
	$idarticulos = $_POST['idarticulos'];

    $query = "CALL traerdatosarticulos(".$idarticulos.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));
?>

<script>
$(document).ready(function(){

});
</script>

<? $row = mysqli_fetch_array($datos,MYSQL_ASSOC);
$id = $row['id'];
$nombre = $row['nombre'];
$cod_rubro = $row['codrubro'];
$cod_materiales = $row['idmateriales'];
$precio = number_format($row['precio'],2,'.','');
$stock = $row['stock1'];

include 'abm_articulos.php';?>

