<script>
$(document).ready(function(){

	$("#busq_nombre").click(function(evento){
		evento.preventDefault();
		cargar_usuarios_lista_todos('por_nombre');
	});

	$("#id_nuevo").click(function(evento){
		evento.preventDefault();
		$('#id_usuarios').data("idusuario",0);
		$('#id_usuarios').data("usuario",'');
		$('#id_usuarios').load("usuarios/div_datos.php");

	});

	
	$("#text_nombre").focus();
	// Cargar la lista de los datos
	cargar_usuarios_lista_todos('');

});
</script>

<form role="form" name="f_busq_usuarios" id="id_busq_usuarios" class="form-inline">

  <div class="form-group">
    <div class="col-xs-8 nopadding">
		<input id="text_nombre" name="text_nombre" type="text" class="form-control" placeholder="Buscar por nombre" value="">
  	</div>

    <div class="col-xs-2 nopadding">
		<button class="btn btn-default" title="Buscar por nombre" id="busq_nombre"><i class="glyphicon glyphicon-search"></i></button>
    </div>

    <div class="col-xs-2 nopadding">
		<button class="btn btn-default" title="Nuevo Usuario" id="id_nuevo"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
  </div>


</form>