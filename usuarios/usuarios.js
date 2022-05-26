/* ------------------------------------ USUARIOS ---------------------------------------- */


function limpiarusuarios() {
 	document.f_abm_usuarios.doper.value="A";
	document.f_abm_usuarios.idusuario.value="0";
	document.f_abm_usuarios.dapellido.value="";
	document.f_abm_usuarios.dnombres.value="";
	document.f_abm_usuarios.demail.value="";
	document.f_abm_usuarios.dpassword.value="";
	document.f_abm_usuarios.rbhabilitado.value="1";

}



function cargar_usuarios_lista_todos(busqueda){

	var text_nombre = '';

	if(busqueda != '')
	{
    	var text_nombre = document.f_busq_usuarios.text_nombre.value;
    };

	$.ajax({
			beforeSend:function() {$('.spiner').show();},
			url: 'usuarios/div_lista_todos.php',
			cache: false,
			type: "POST",
			data: "text_nombre="+text_nombre+"&busqueda="+busqueda,
	        success: function(datos){
				$("#id_usuarios").html(datos);
			},
	        complete: function(objeto, exito){
				$('.spiner').hide();
				if(exito=="success"){
					document.f_busq_usuarios.text_nombre.value = "";
	            }
	        },
			error: function(objeto, quepaso, otroobj){
	            alert("Se produjo un error de conexion ");
	        }
		});

}

function eliminar_usuario(idusuario,usuario) {
	$('#id_usuarios').data("idusuario",idusuario);
	$('#id_usuarios').data("usuario",usuario);

   	$('#id_modal_confirm').html("<span>Está seguro que desea eliminar al usuario "+usuario+"?</span>");
	$('#id_modal_confirm2').html("<small>Si se confirma se dejará de visualizar en todas las opciones que se encuentre vinculado.</small>");

	$("#modal_confirm").modal('show');
}

function editar_usuario(idusuario,usuario) {
	$('#id_usuarios').data("idusuario",idusuario);
	$('#id_usuarios').data("usuario",usuario);
	$('#id_usuarios').load("usuarios/div_datos.php");
}


/******************/
/* DATOS BASICOS */
/******************/

function cargar_usuarios_datos() {

	var idusuario = $('#id_usuarios').data("idusuario");

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'usuarios/traerdatosusuarios.php',
		cache: false,
		type: "POST",
		data: "idusuario="+idusuario,
        success: function(datos){
			$("#usuario-datos").html(datos);
		},
        complete: function(objeto, exito){
            $('.spiner').hide();
			if(exito=="success"){

				$("#datos").collapse('show');
				$("#dapellido").focus();
				if(idusuario==0){limpiarusuarios();return;};

				var hab= $("#codhab").prop("value");
				if(hab == 1)
				{
					$('#habsi').prop('checked', true);
				}
				if (hab == 0) {
					$('#habno').prop('checked', true);
				};

				var nivel = $("#codnivel").prop("value");
				$("#sel_nivel option[value="+nivel+"]").attr("selected",true);


				document.f_abm_usuarios.doper.value="M";
				var id = $("#idusuario").val();

            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});

}
function grabardatosusuarios(oper) {


	if(oper == "B")
	{
		$("#modal_confirm").modal('hide');
		var idusuario = $('#id_usuarios').data("idusuario");
		var apellido = '';
		var nombres = '';
		var email = '';
        var hab = 0;
        var password="";
		var nivel = 0;
	} else
	{
		var idusuario = document.f_abm_usuarios.idusuario.value;
		var apellido = document.f_abm_usuarios.dapellido.value;
		var nombres = document.f_abm_usuarios.dnombres.value;
		var email = document.f_abm_usuarios.demail.value;
		var password = document.f_abm_usuarios.dpassword.value;
		if($("#habsi").prop('checked')){var hab = 1};
		if($("#habno").prop('checked')){var hab = 0};
		var nivel = $("#sel_nivel option:selected").attr("value");

		$("#dapellido, #dnombres, #ddocumento, #demail").closest('.form-group').removeClass('has-error');

	    var error = "";
		if(apellido==''){$("#dapellido").closest('.form-group').addClass('has-error');error=error+"Ingresar el Apellido<br>";};
		if(nombres==''){$("#dnombres").closest('.form-group').addClass('has-error');error=error+"Ingresar el Nombre<br>";};
		if(email==''){$("#demail").closest('.form-group').addClass('has-error');error=error+"Ingresar el Email<br>";};
		if(password==''){$("#dpassword").closest('.form-group').addClass('has-error');error=error+"Ingresar la Contraseña<br>";};


		if (error != "")
		{
			$("#id_modal_aviso").html('<span>'+error+'</span>');
			$("#modal_aviso").modal('show');
			return;

		};
		if(idusuario == 0){oper = "A";};
		var usuario = apellido + ' ' + nombres;
	};

	var datos = "oper="+oper+"&idusuario="+idusuario+"&apellido="+apellido+"&nombres="+nombres+"&email="+email+"&password="+password+"&hab="+hab+"&nivel="+nivel;

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'usuarios/grabardatosusuarios.php',
		cache: false,
		type: "POST",
		data: datos,
        success: function(datos){
			$("#div_msgerror").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
			if(exito=="success"){
                var msg_error = $("#msg_error").val();
                var new_idusuario = $("#new_idusuario").val();
                if(msg_error != '')
                {
					$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
					$("#modal_aviso").modal('show');

                } else
                {
					$('#id_container').load("usuarios/div_usuarios.php");
					return;

				};
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}



