
<?php
	include '../conexion.php';
	$id = $_POST['id'];

	$query = "CALL traerarticulos_lista (".$id.")";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

?>
<script type="text/javascript">
$(document).ready(function() {

	$('#tab-listado').DataTable( {
		"searching":   false,
		"scrollY":    "400px",
        "scrollX":    false,
		"paging":     false,
		"info":       false,
		"order": [[ 1, "asc" ]],
		"bSort": true
	} );

});
</script>


<table class="table table-bordered table-striped table-hover table-condensed dataTable" id="tab-listado">
<thead><tr class="text-center text-label">
	<td id="col1" class="" title="" >Código</td>
	<td id="col2" class="" title="" >Nombre</td>
	<td id="col3" class="" title="" >Rubro</td>
	<td id="col4" class="" title="" >Precio</td>
	<td id="col5" class="" title="" >Stock</td>
	
	<td></td><td></td></tr></thead>
<?php
	while ($row = mysqli_fetch_array($datos,MYSQL_ASSOC)) { ?>
		
		
		<?php if($row['stock']<$row['stockmin']){?>
			<tr class="bg-rojo" >
		<? }else{?>		
        	<tr class="">
       	<? } ?>
        	<td data-title="" class="font-lista text-center col-xs-1"><?php echo($row['id']);?></td>
        	<td data-title="" class="font-lista text-left col-xs-4"><?php echo($row['nombre']);?></td>
        	<td data-title="" class="font-lista text-left col-xs-4"><?php echo($row['descripcion']);?></td>
        	<td data-title="" class="font-lista text-right col-xs-2"><?php echo(number_format($row['precio'],2,'.',''));?></td>
        	<td data-title="" class="font-lista text-right col-xs-6"><?php echo($row['stock']);?></td>

        	<td data-title="Editar"  class="text-center b_horarios" >
				<button type="button" class="btn btn-default btn-sm" title="Editar" onclick="editar_articulos(<?php echo($row['id']);?>)">
	      			<span class="glyphicon glyphicon-edit"></span>
	    		</button>
        	</td>

        	<td data-title="Eliminar" class="text-center b_horarios" >
				<button type="button" class="btn btn-default btn-sm" title="Eliminar" onclick="eliminar_articulos(<?php echo($row['id']);?>)">
	      			<span class="glyphicon glyphicon-trash"></span>
	    		</button>
        	</td>
    	</tr>    	
    	
	<? } ?>

</table>






