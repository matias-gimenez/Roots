<script>
$(document).ready(function(){



	$("#modal_aviso1_ok, #modal_aviso1_close").click(function(evento){
		evento.preventDefault();
		var idprof = $('body').data("idprof");
		var opcion = $('#div_inicio').data("opcion");
        window.open('./index.php','_self');

	});

	var opcion = $('#div_inicio').data("opcion");
	//$('#id_opcion').html('<p class="text-center xtext-primary" id="id_opcion">Backend</p>');

    $('#div_registro').load("seguridad/registro_plus.php");

/*	if(opcion == 1){$('#id_logo').html('<img src="seguridad/image/logo_login.png" class="img-responsive center-block" id="avatar">');};
	if(opcion == 3){$('#id_logo').html('<img src="image/avatar_doc.png" class="img-responsive center-block" id="avatar">');};
	if(opcion == 4){$('#id_logo').html('<img src="image/avatar_admin.png" class="img-responsive center-block" id="avatar">');};
*/

});

</script>

<div id="id_contenido" class="center-block">
    <div class="row">
        <div class="col-xs-12">
          <h4><p class="text-center text-titlogin"></p></h4>
          <h4 class="text-center"><span class="text-center text-titlogin">Gestion empresa</span></h4>
        </div>
    </div>
    <br><br>
	<div class="row">
		<div class="col-xs-12" id="id_logo">
        <img src="./image/verde.png" class="img-responsive center-block logo-login" id="avatar">
		</div>
	</div>

	<div class="row">
		<div id="div_registro" class="center-block">
		</div>
	</div>

	<br />


</div>

<div id="modal_aviso1" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_aviso1_close">&times;</button>
                <h4 class="modal-title">Aviso</h4>
            </div>
            <div class="modal-body">
                <p class="text-warning" id="id_modal_aviso1"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_aviso1_ok">Ok</button>
            </div>
        </div>
    </div>
</div>