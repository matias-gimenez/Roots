<script>
$(document).ready(function(){


	$("#id_nuevo").click(function(evento){
		evento.preventDefault();
		$('#id_articulos').data("idarticulos",0);
		$('#id_articulos').data("articulos",'');
		$('#id_articulos').load("articulos/div_datos.php");

	});

	$( "#text_nombre").autocomplete({
		source: "articulos/buscarticulos.php",
		minLength: 2,
		autoFocus: true,
		select: function(event, ui) {
		  cargar_articulos_lista_todos(ui.item.id);
		},
		close: function( event, ui ) {
		  $("#text_nombre").prop("value",'');
		}
	});

	$("#info_clientes").click(function(evento){
		evento.preventDefault();
		generar_info();
	});

	
	$("#text_nombre").focus();
	// Cargar la lista de los datos
	cargar_articulos_lista_todos(0);

});
</script>

<form role="form" name="f_busq_articulos" id="id_busq_articulos" class="form-horizontal">

  <div class="form-group">
    <div class="col-xs-7 col-sm-7 nopadding padding-busq">
		<input id="text_nombre" name="text_nombre" type="text" class="form-control" placeholder="Buscar por nombre" value="">
  	</div>

    <div class="col-xs-2 col-sm-1 nopadding padding-xs">
		<button class="btn btn-default" title="Nuevo Articulo" id="id_nuevo"><i class="glyphicon glyphicon-plus"></i></button>
    </div>

  </div>


</form>