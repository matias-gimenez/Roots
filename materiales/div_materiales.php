<script src="materiales/materiales.js" type="text/javascript"></script>

<script>
$(document).ready(function(){

	$("#id_volver").click(function(evento){
        evento.preventDefault();
        cargar_materiales_lista_todos(0);
    });



	// Cerrar la ventana
	$(".close").click(function(evento){
		evento.preventDefault();
		$('#id_container').empty();
	});

	// Confirmación de la eliminación del objeto seleccionado
	$("#id_confirm_baja").click(function(evento){
		evento.preventDefault();
		$('body').removeClass('modal-open');
		grabardatosmateriales("B");
	});

	// Cargar los datos para la busqueda
	$('#id_materiales_busq').load("materiales/busq_materiales.php");


});
</script>


<div id="div_materiales" class="center-block">

<!--// Sector del icono del cargando...//-->
<div class="spiner" id="div_centrado" style="display:none">
    <div class="ball1"></div>
</div>


<div class="panel panel-calif bg-calif">

    <!--// Cabecera del Panel //-->
	<div class="panel-heading clearfix">
		<div class="row">
			<div class="col-xs-10 col-sm-3">
				<h2 class="panel-title pull-left font-titulo-sector">Materiales</h2>
			</div>

			<div class="col-xs-2 col-sm-1 col-sm-push-8">
				<button type="button" class="close" aria-hidden="true">&times;</button>
			</div>

			<div class="col-xs-12 col-sm-8 col-sm-pull-1" id="id_materiales_busq"></div>
		</div>
	</div>

    <!--// Contenido del Panel //-->
	<div class="panel-body" id="id_materiales"></div>

</div>
	<div id="modal_confirm" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Confirmación</h4>
	            </div>
	            <div class="modal-body">
	                <p class="text-warning" id="id_modal_confirm"></p>
	                <p id="id_modal_confirm2"></p>
	           </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                <button type="button" class="btn btn-primary" id="id_confirm_baja">Confirmar</button>
	            </div>
	        </div>
	    </div>
	</div>
</div>