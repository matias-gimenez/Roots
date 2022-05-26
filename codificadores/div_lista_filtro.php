
<?php
	include '../conexion.php';
	$busqueda = $_POST['busqueda'];
	$codificador = $_POST['codificador'];

	$query = "CALL traercodificadores_lista ('".$busqueda."',".$codificador.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

?>



<ul class="list-group" id="id_listas" >
<?php
	while ($row = mysqli_fetch_array($datos,MYSQL_ASSOC)) {?>

		<li class="list-group-item cpointer" onclick="editar_codificador(<?php echo($row['id']);?>,<?php echo($row['idcodificador']);?>,'<?php echo($row['descripcion']);?>')"><span class="font-lista"><?php echo($row['descripcion']);?> </span>

			<div class=" pull-right">
				<!--// Boton para editar los datos //-->
				<button type="button" class="btn btn-default btn-sm" title="Editar" onclick="editar_codificador(<?php echo($row['id']);?>,<?php echo($row['idcodificador']);?>,'<?php echo($row['descripcion']);?>')">
	      			<span class="glyphicon glyphicon-edit"></span>
	    		</button>

				<!--// Boton para eliminar los datos //-->
				<button type="button" class="btn btn-default btn-sm " title="Eliminar" onclick="eliminar_codificador(<?php echo($row['id']);?>,<?php echo($row['idcodificador']);?>,'<?php echo($row['descripcion']);?>')">
	      			<span class="glyphicon glyphicon-trash"></span>
	    		</button>
    		</div>

    	</li>
	<? } ?>
</ul>


