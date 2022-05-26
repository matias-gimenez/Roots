<script>
$(document).ready(function(){

	$("#busq_nombre").click(function(evento){
		evento.preventDefault();
		
	});

	$("#id_nuevo").click(function(evento){
		evento.preventDefault();
		$('#id_codificadores').data("id",0);
		$('#id_codificadores').data("idcodificador",0);
		$('#id_codificadores').data("codificador",'');
		$('#id_codificadores').load("codificadores/div_datos.php");


	});

	
	
	// Cargar la lista de los datos
	cargar_codificadores_lista('por_filtro');

});
</script>

<form role="form" name="f_busq_codificadores" id="id_busq_codificadores" class="form-inline">

  <div class="form-group">
    <div class="col-xs-10 nopadding">
		<select name="sel_codificador" class="form-control" id="sel_codificador" onchange="cargar_codificadores_lista('por_filtro')" > <!--onchange="cargar_codificadores_lista('por_filtro')-->
			<option value="1">Rubros</option> 

		</select>

  	</div>

    <div class="col-xs-1 nopadding">
		<button class="btn btn-default" title="Nuevo codificador" id="id_nuevo"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
  </div>






</form>