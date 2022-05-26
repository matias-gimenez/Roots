/* ------------------------------------ USUARIOS ---------------------------------------- */

function limpiarmateriales() {
 	document.f_abm_materiales.doper.value="A";
	document.f_abm_materiales.idmateriales.value="0";
	document.f_abm_materiales.codtipo.value="0";
}

function cargar_materiales_lista_todos(id){

	

	$.ajax({
			beforeSend:function() {$('.spiner').show();},
			url: 'materiales/div_lista_todos.php',
			cache: false,
			type: "POST",
			data: "id="+id,
			success: function(datos){
				$("#id_materiales").html(datos);
			},
	        complete: function(objeto, exito){
				$('.spiner').hide();
				if(exito=="success"){
					document.f_busq_materiales.text_nombre.value = "";				
	            }
	        },
			error: function(objeto, quepaso, otroobj){
	            alert("Se produjo un error de conexion ");
	        }
		});
}

function eliminar_materiales(idmateriales,materiales) {

	$('#id_materiales').data("idmateriales",idmateriales);
	$('#id_materiales').data("materiales",materiales);
   	$('#id_modal_confirm').html("<span>Está seguro que desea eliminar el material seleccionado?</span>");
	$("#modal_confirm").modal('show');
}

function editar_materiales(idmateriales,materiales) {
	$('#id_materiales').data("idmateriales",idmateriales);
	$('#id_materiales').data("materiales",materiales);
	$('#id_materiales').load("materiales/div_datos.php");
}

/******************/
/* DATOS BASICOS */
/******************/

function cargar_materiales_datos() {

	var idmateriales = $('#id_materiales').data("idmateriales");
	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'materiales/traerdatosmateriales.php',
		cache: false,
		type: "POST",
		data: "idmateriales="+idmateriales,
        success: function(datos){
			$("#materiales-datos").html(datos);
		},
        complete: function(objeto, exito){
            $('.spiner').hide();
			if(exito=="success"){

				$("#datos").collapse('show');
				$("#nombre").focus();
				if(idmateriales==0){limpiarmateriales();return;};

				document.f_abm_materiales.doper.value="M";
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}


function grabardatosmateriales(oper) {


	if(oper == "B")
	{
		$("#modal_confirm").modal('hide');
		var idmateriales = $('#id_materiales').data("idmateriales");
		var nombre = '';
		var color = '';
        var codtipo = 0;
      
	} else
	{
		var idmateriales = $('#idmateriales').prop('value');
		var nombre = $('#nombre').prop("value");
		var color = $('#color').prop("value");
		var codtipo = $("#codtipo option:selected").attr("value");
			
		$("#nombre, #color, #codtipo").closest('.form-group').removeClass('has-error');

	    var error = "";
	    if(nombre==''){$("#nombre").closest('.form-group').addClass('has-error');error=error+"Ingresar el nombre<br>";};
	    if(color==''){$("#color").closest('.form-group').addClass('has-error');error=error+"Ingresar el color<br>";};
		if(codtipo==0){$("#codtipo").closest('.form-group').addClass('has-error');error=error+"Seleccionar el rubro<br>";};

		if (error != "")
		{
			$("#id_modal_aviso").html('<span>'+error+'</span>');
			$("#modal_aviso").modal('show');
			return;
		};

		if(idmateriales == 0){oper = "A";};
	};

	var datos = "oper="+oper+"&idmateriales="+idmateriales+"&nombre="+nombre+"&color="+color+"&codtipo="+codtipo;

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'materiales/grabardatosmateriales.php',
		cache: false,
		type: "POST",
		data: datos,
        success: function(datos){

        	console.log(datos)
			$("#div_msgerror").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
			if(exito=="success"){
                var msg_error = $("#msg_error").val();
                var new_idmateriales = $("#new_idmateriales").val();
                if(msg_error != '')
                {
					$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
					$("#modal_aviso").modal('show');

                } else
                {
					cargar_materiales_lista_todos(0);

					//$('#id_container').load("materiales/div_materiales.php");
					//return;
				};
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}

function generar_info() {

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'materiales/generar_info.php',
		cache: false,
		type: "POST",
		//data: txdata,
        success: function(datos){
			$("#div_temp").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
			if(exito=="success"){
		   		//document.f_abm_usuario.oper.value="M";
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}

