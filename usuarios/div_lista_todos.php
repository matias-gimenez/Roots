
<?php
	include '../conexion.php';
	$busqueda = $_POST['busqueda'];
	$text_nombre = $_POST['text_nombre'];
	

	$query = "CALL traerusuarios_lista ('".$busqueda."','".$text_nombre."')";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

?>

<ul class="list-group" id="id_listas">
	<?php
	while ($row = mysqli_fetch_array($datos,MYSQL_ASSOC)) {?>

		<li class="list-group-item cpointer" onclick="editar_usuario(<?php echo($row['id']);?>,'<?php echo($row['nombre']);?>')"><span class="font-lista "><?php echo($row['nombre']);?> | <?php echo($row['email']);?></span>

			<div class=" pull-right">
				<!--// Boton para editar los datos //-->
				<button type="button" class="btn btn-default btn-sm sep-button" title="Editar" onclick="editar_usuario(<?php echo($row['id']);?>,'<?php echo($row['nombre']);?>')">
	      			<span class="glyphicon glyphicon-edit"></span>
	    		</button>

				<!--// Boton para eliminar los datos //-->
				<button type="button" class="btn btn-default btn-sm sep-button" title="Eliminar" onclick="eliminar_usuario(<?php echo($row['id']);?>,'<?php echo($row['nombre']);?>')">
	      			<span class="glyphicon glyphicon-trash"></span>
	    		</button>
    		</div>

    	</li>
	<? } ?>

</div>





