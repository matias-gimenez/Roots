
<script>
$(document).ready(function(){

	$("#id_volver2").show();

	$("#id_datos").click(function(evento){
		evento.preventDefault();

		// No hacer nada si se esta cerrando
		var clase = $("#datos").attr('class');
	    if(clase == "panel-collapse collapse in"){return;};

		cargar_codificadores_datos();
	});

	var id = $('#id_codificadores').data("id");
	var idcodificador = $('#id_codificadores').data("idcodificador");
	var codificador = $('#id_codificadores').data("codificador");

	//$('#id_busq_codificadores').empty();
	// if(id>0)
	// {
	// 	$('#id_busq_codificadores').html("<span class='font-titulo-item pull-right'>"+codificador+"</span>");
	// } else
	// {
	// 	$('#id_busq_codificadores').html("<span class='font-titulo-item pull-right'>Nuevo codificador</span>");
	// 	$('.accesorios').hide();
	// };

	cargar_codificadores_datos();



});
</script>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

	<div class="panel panel-calif bg-calif">
		<div class="panel-heading">
				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#datos" aria-expanded="false" aria-controls="datos" id="id_datos">
					<img class="media-object glyphicons1" src="image/glyphicons/glyphicons-30-notes-2.png" alt=""><span class="font-titulo-2">Datos Básicos</span>
				</a>
		</div>

		<div id="datos" class="panel-collapse collapse">
			<div class="panel-body" id="codificadores-datos">
			</div>
		</div>

	</div>


</div>