/* ------------------------------------ USUARIOS ---------------------------------------- */

function limpiarcodificadores() {
 	document.f_abm_codificadores.oper.value="A";
	document.f_abm_codificadores.id.value=0;
	document.f_abm_codificadores.cdescripcion.value="";
}

function cargar_codificadores_lista(busqueda) {
	
	var busqueda = busqueda;
	var codificador = $("#sel_codificador option:selected").attr("value");

		$.ajax({
		 	
			url: 'codificadores/div_lista_filtro.php',
			cache: false,
			type: "POST",
			data: "busqueda="+busqueda+"&codificador="+codificador,
			 success: function(datos){
				$("#id_codificadores").html(datos);
			},
	        complete: function(objeto, exito){
				$('.spiner').hide();
				if(exito=="success"){
					
	            }
	        },
			error: function(objeto, quepaso, otroobj){
	            alert("Se produjo un error de conexion ");
	        }
		});
}

function eliminar_codificador(id,idcodificador,codificador) {
	$('#id_codificadores').data("id",id);
	$('#id_codificadores').data("idcodificador",idcodificador);
	$('#id_codificadores').data("codificador",codificador);
	

   	$('#id_modal_confirm').html("<span>Está seguro que desea eliminar el codificador "+codificador+"?</span>");
	$('#id_modal_confirm2').html("<small>Si se confirma se dejará de visualizar en todas las opciones que se encuentre vinculado.</small>");

	$("#modal_confirm").modal('show');
}

function editar_codificador(id,idcodificador,codificador) {

	$('#id_codificadores').data("id",id);
	$('#id_codificadores').data("idcodificador",idcodificador);
	$('#id_codificadores').data("codificador",codificador);
	$('#id_codificadores').load("codificadores/div_datos.php");
}


/******************/
/* DATOS BASICOS */
/******************/

function cargar_codificadores_datos() {

	var id = $('#id_codificadores').data("id");
	var idcodificador = $('#id_codificadores').data("idcodificador");


	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'codificadores/traerdatoscodificadores.php',
		cache: false,
		type: "POST",
		data: "id="+id+"&idcodificador="+idcodificador,
        success: function(datos){
			$("#codificadores-datos").html(datos);
		},
        complete: function(objeto, exito){
            $('.spiner').hide();
			if(exito=="success"){

				$("#datos").collapse('show');
				$("#cdescripcion").focus();

				if(id==0){limpiarcodificadores();return;};
				
				document.f_abm_codificadores.oper.value="M";
				//var id = $("#idalumno").val();

				var codificador = $("#idcodificador").attr("value");
				$("#sel_codificador option[value="+codificador+"]").attr("selected",true);

				var habilitado = $("#habilitado").attr("value");

				if(habilitado==1) 
					{$('#rbhabilitadono').prop('checked', true);}

				if(habilitado==2) 
					{$('#rbhabilitadosi').prop('checked', true);}				
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});

}

function grabardatoscodificadores(oper) {

	if(oper == "B")
	{
		var id = $('#id_codificadores').data("id");
		var idcodificador = $('#id_codificadores').data("idcodificador");
		
		var descripcion = "";
		var habilitado = 0;
		$("#modal_confirm").modal('hide');
	
	} else
	{
		var id = document.f_abm_codificadores.id.value;
		var idcodificador = $("#sel_codificador option:selected").attr("value");
		var descripcion = document.f_abm_codificadores.cdescripcion.value;
		
		if($('#rbhabilitadosi').prop('checked')){var rbhabilitado = 2}else{
			if($('#rbhabilitadono').prop('checked')){var rbhabilitado = 1}
				else{rbhabilitado=0}
		};

		$("#descripcion, #habilitado").closest('.form-group').removeClass('has-error');

	    var error = "";
		if(descripcion==''){$("#descripcion").closest('.form-group').addClass('has-error');error=error+"Ingresar la descripcion<br>";};
		
		if (error != "")
		{
			$("#id_modal_aviso").html('<span>'+error+'</span>');
			$("#modal_aviso").modal('show');
			return;

		};
		if(id == 0){oper = "A";};
		//var usuario = apellido + ' ' + nombres;
	};

	var datos = "oper="+oper+"&id="+id+"&idcodificador="+idcodificador+"&descripcion="+descripcion+"&habilitado="+rbhabilitado;


	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'codificadores/grabardatoscodificadores.php',
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
                var new_idcodificador = $("#new_idcodificador").val();
                if(msg_error != '')
                {
					$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
					$("#modal_aviso").modal('show');

                } else
                {
					cargar_codificadores_lista('por_filtro');
					//$('#id_container').load("codificadores/div_codificadores.php");
					return;

				};
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}



