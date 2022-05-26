/* ------------------------------------ USUARIOS ---------------------------------------- */


function limpiararticulos() {
 	document.f_abm_articulos.doper.value="A";
	document.f_abm_articulos.idarticulos.value="0";
	document.f_abm_articulos.stock.value="0";
	$("#precio").floatnumber('.', 2);	
}

function traerrubro(){

	$.ajax({
			beforeSend:function() {$('.spiner').show();},
			url: 'articulos/traerrubro.php',
			cache: false,
			type: "POST",
			//data: "cod_rubro="+cod_rubro,
	        success: function(datos){
				$("#sel_rubro").html(datos);
			},
	        complete: function(objeto, exito){
				$('.spiner').hide();
				if(exito=="success"){
				
					var cod_rubro = $("#cod_rubro").prop("value");
					if(cod_rubro > 0){
						$("#sel_rubro option[value="+cod_rubro+"]").attr("selected",true);
					}

	            }
	        },
			error: function(objeto, quepaso, otroobj){
	            alert("Se produjo un error de conexion ");
	        }
		});
}


function cargar_articulos_lista_todos(id){

	$.ajax({
			beforeSend:function() {$('.spiner').show();},
			url: 'articulos/div_lista_todos.php',
			cache: false,
			type: "POST",
			data: "id="+id,
			success: function(datos){
				$("#id_articulos").html(datos);
			},
	        complete: function(objeto, exito){
				$('.spiner').hide();
				if(exito=="success"){			

				document.f_busq_articulos.text_nombre.value = "";
		
	            }
	        },
			error: function(objeto, quepaso, otroobj){
	            alert("Se produjo un error de conexion ");
	        }
		});
}

function eliminar_articulos(idarticulos,articulos) {
	$('#id_articulos').data("idarticulos",idarticulos);
	$('#id_articulos').data("articulos",articulos);

   	$('#id_modal_confirm').html("<span>Está seguro que desea eliminar el artículo seleccionado?</span>");

	$("#modal_confirm").modal('show');
}

function editar_articulos(idarticulos,articulos) {
	$('#id_articulos').data("idarticulos",idarticulos);
	$('#id_articulos').data("articulos",articulos);
	$('#id_articulos').load("articulos/div_datos.php");
}
/******************/
/* DATOS BASICOS */
/******************/

function cargar_articulos_datos() {

	var idarticulos = $('#id_articulos').data("idarticulos");
	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'articulos/traerdatosarticulos.php',
		cache: false,
		type: "POST",
		data: "idarticulos="+idarticulos,
        success: function(datos){
			$("#articulos-datos").html(datos);
		},
        complete: function(objeto, exito){
            $('.spiner').hide();
			if(exito=="success"){

				$("#datos").collapse('show');
				$("#nombre").focus();
				if(idarticulos==0){limpiararticulos();return;};


				var cod_proveedores = $("#cod_proveedores").prop("value");
				$("#sel_proveedores option[value="+cod_proveedores+"]").attr("selected",true);

				$("#precio").floatnumber('.', 2);

				document.f_abm_articulos.doper.value="M";
            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }
	});
}

function grabardatosarticulos(oper) {

	if(oper == "B")
	{
		$("#modal_confirm").modal('hide');
		var idarticulos 	= $('#id_articulos').data("idarticulos");
		var nombre 			= '';
        var cod_rubro 		= 0;
        var cod_materiales 	= 0;
        var precio 			= 0;        
        var stock 			= 0;
        
	} else
	{
		var idarticulos 	= $('#idarticulos').prop('value');
		var nombre 			= $('#nombre').prop("value");
		var cod_rubro 		= $("#sel_rubro option:selected").attr("value");
		var cod_materiales 	= $("#sel_materiales option:selected").attr("value");
		var precio 			= $('#precio').prop('value');
		var stock 			= $('#stock').prop('value');		
						
		if (stock == ''){var stock ='0';};
		$("#nombre , #sel_rubro , #sel_materiales, #precio, #stock" ).closest('.form-group').removeClass('has-error');

	    var error = "";

	    if(nombre==''){$("#nombre").closest('.form-group').addClass('has-error');error=error+"Ingresar el nombre<br>";};		
		if(cod_rubro==0){$("#sel_rubro").closest('.form-group').addClass('has-error');error=error+"Seleccionar el rubro<br>";};
		if(cod_materiales==0){$("#sel_rubro").closest('.form-group').addClass('has-error');error=error+"Seleccionar el rubro<br>";};
		if(precio==0){$("#precio").closest('.form-group').addClass('has-error');error=error+"Ingresar el precio<br>";}

		if (error != "")
		{
			$("#id_modal_aviso").html('<span>'+error+'</span>');
			$("#modal_aviso").modal('show');
			return;

		};
		if(idarticulos == 0){oper = "A";};
	};

	var datos = "oper="+oper+"&idarticulos="+idarticulos+"&nombre="+nombre+"&cod_rubro="+cod_rubro+"&cod_materiales="+cod_materiales;
	var datos = datos +"&precio="+precio+"&stock="+stock;

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'articulos/grabardatosarticulos.php',
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
                var new_idarticulos = $("#new_idarticulos").val();
                if(msg_error != '')
                {
					$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
					$("#modal_aviso").modal('show');

                } else
                {
					cargar_articulos_lista_todos(0);
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
		url: 'articulos/generar_info.php',
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

