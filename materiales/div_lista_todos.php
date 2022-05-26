
<?php
	include '../conexion.php';
	$id = $_POST['id'];
	$text_nombre = $_POST['text_nombre'];

	$query = "CALL traermateriales_lista ('".$id."','".$text_nombre."')";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

?>

<table class="table table-bordered table-striped table-hover table-condensed dataTable" id="tab-listado">
<thead><tr class="text-center text-label">
	
	<td id="col1" class="" title="" >Código</td>
	<td id="col2" class="" title="" >Nombre</td>
	<td id="col3" class="" title="" >Color</td>
	
	<td></td><td></td></tr></thead>
<?php
	while ($row = mysqli_fetch_array($datos,MYSQL_ASSOC)) { ?>
		
		
		<?php if($row['stock']<$row['stockmin']){?>
			<tr class="bg-rojo" >
		<? }else{?>		
        	<tr class="">
       	<? } ?>
        	<td data-title="" class="font-lista text-center col-xs-2"><?php echo($row['id']);?></td>
        	<td data-title="" class="font-lista text-left col-xs-6"><?php echo($row['nombre']);?></td>
        	<td data-title="" class="font-lista text-left col-xs-6"><?php echo($row['color']);?></td>

        	<td data-title="Editar"  class="text-center b_horarios" >
				<button type="button" class="btn btn-default btn-sm" title="Editar" onclick="editar_materiales(<?php echo($row['id']);?>)">
	      			<span class="glyphicon glyphicon-edit"></span>
	    		</button>
        	</td>

        	<td data-title="Eliminar" class="text-center b_horarios" >
				<button type="button" class="btn btn-default btn-sm" title="Eliminar" onclick="eliminar_materiales(<?php echo($row['id']);?>)">
	      			<span class="glyphicon glyphicon-trash"></span>
	    		</button>
        	</td>
    	</tr>	
<? } ?>

</table>






