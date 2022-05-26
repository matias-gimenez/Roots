<script>
	$(document).ready(function(){

	$("#ingreso").click(function(evento){
		evento.preventDefault();
		ingresar(0);
	});

	$("#bolvido").click(function(evento){
		evento.preventDefault();
    	ingresar(1);
	});


	$("#id_registro").keypress(function(e)
		{
			if(e.which == 13){
				ingresar(0);
			}
		}
	);

	    var ch_recordar = window.localStorage.getItem("recordar");
	    if(ch_recordar == null || ch_recordar == 0)
	    {
	        $('#email').prop("value",'');
	        $('#pass').prop("value",'');
	        $('#ch_recordar').prop('checked',false);
			$("#sel_opcion option[value=0]").attr("selected",true);
	    } else
	    {
	        $('#email').prop("value",window.localStorage.getItem("email"));
	        $('#pass').prop("value",window.localStorage.getItem("clave"));
	        $('#ch_recordar').prop('checked',true);
	        var perfil = window.localStorage.getItem("perfil");
			$("#sel_opcion option[value="+perfil+"]").attr("selected",true);

	    };

	});
</script>


<form role="form" class="form-horizontal" name="f_registro" id="id_registro" >

	<div style="display:none"><INPUT TYPE="hidden" NAME="userid" id="userid" value="<?= $usuid;?>"></div>
	<div style="display:none"><INPUT TYPE="hidden" NAME="perfil" id="perfil" value="<?= $perfil;?>"></div>

 	<div class="form-group form-group-sm">
		<div class="col-xs-12">
	   		<select name="sel_opcion" class="form-control" id="sel_opcion">
				<option value="0">SELECCIONAR PERFIL</option>
				<option value="1">ADMINISTRADOR</option>
				<!--<option value="2">VENDEDOR</option> -->
			</select>
		</div>
 	</div>
 	
	<div class="form-group ">
		<div class="col-xs-12">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" autofocus value="">
		</div>
	</div>

	<div class="form-group ">
		<div class="col-xs-12">
			<input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" value="" >
		</div>
	</div>

	<button type="button" class="btn btn-success btn-block" id="ingreso">Iniciar Sesión</button>

	<br><br>
</form>

<div id="datosuser" class="alert alert-danger" style="display:none"><?= $mensaje;?></div>
