
<script>
$(document).ready(function(){

	$("#id_datos").click(function(evento){
		evento.preventDefault();

		// No hacer nada si se esta cerrando
		var clase = $("#datos").attr('class');
	    if(clase == "panel-collapse collapse in"){return;};

		cargar_articulos_datos();
	});

/*	var idarticulos = $('#id_articulos').data("idarticulos");
	var articulos = $('#id_articulos').data("articulos");

	$('#id_articulos_busq').empty();
	if(idarticulos>0)
	{
		$('#id_articulos_busq').html("<span class='font-titulo-item pull-right'>"+articulos+"</span>");
	} else
	{
		$('#id_articulos_busq').html("<span class='font-titulo-item pull-right'>Nuevo</span>");
		$('.accesorios').hide();
	};*/

	cargar_articulos_datos();



});
</script>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

	<div class="panel panel-calif bg-calif">
		<div class="panel-heading">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#datos" aria-expanded="false" aria-controls="datos" id="id_datos">
					<div><img class="media-object glyphicons1" src="image/glyphicons/glyphicons-30-notes-2.png" alt=""><span class="font-titulo-2">Datos Básicos</span></div>
				</a>
		</div>

		<div id="datos" class="panel-collapse collapse">
			<div class="panel-body" id="articulos-datos">
			</div>
		</div>

	</div>


</div>