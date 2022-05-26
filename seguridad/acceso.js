function acceder(olvido) {
    //var opcion = document.f_registro.opcion.value;
    //var opcion=$('#div_inicio').data("opcion");
	var opcion = $("#sel_opcion option:selected").attr("value");

	var email = document.f_registro.email.value;
	var clave = document.f_registro.pass.value;
    var userid = document.f_registro.userid.value;

    var ch_recordar = $('#ch_recordar').prop('checked');
	if(ch_recordar){
		window.localStorage.setItem("email",email);
		window.localStorage.setItem("clave",clave);
		window.localStorage.setItem("recordar",1);
		window.localStorage.setItem("perfil",opcion);
	} else {
		window.localStorage.setItem("email",'');
		window.localStorage.setItem("clave",'');
		window.localStorage.setItem("recordar",0);
		window.localStorage.setItem("perfil",1);
	}


   	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: ruta_app+'seguridad/ingresar.php',
		cache: false,
		type: "POST",
		data: "opcion="+opcion+"&email="+email+"&clave="+clave+"&olvido="+olvido,
		success: function(datos){
			$("#div_registro").html(datos);
		},
        complete: function(objeto, exito){
			if(exito=="success"){

				var userid = $("input#userid").val();
				var resp   = $("input#reg_resp").val();
				var perfil = $("input#perfil").val();

				//var email = $("input#email").val();
                $('#div_inicio').data("cambios",0); // Inicializar el control de varios clicks
				$('.spiner').hide();

				if (resp == -1)
				{
				    div_validar = '<div title="Aviso">Se ha enviado un email a la casilla de correo <font color="red">'+email+'</font> con las instrucciones de como renovar la clave de acceso.<br><font color="red">Si no lo encuentra revise la carpeta Span o Correo no Deseado.</font> </div>'
					$("#id_modal_aviso1").html('<span>'+div_validar+'</span>');
					$("#modal_aviso1").modal('show');
				    $('#id_contenido').empty();

                } else
                {
					if( userid > 0){

						$("#div_olvidoclave").hide();
						$("#div_registro").hide();
						$("#div_inicio").hide();

						// Seleccionar el Menu en funcion al Perfil
						switch(perfil) {
							case 'ADMINISTRADOR':
								var menu = "seguridad/menu_admin.php";
							break;
						}

						$('header').load(menu);
						//$('.content').css('background-color', '#FFFFFF');
						$('#id_container').empty();
						//$('#div_cuerpo').show();

						traer_nomusuario(userid,perfil);

					}  else
					{
						$("#datosuser").show().delay(2000).fadeOut((500),function() {
							$("input#docnro").focus();
						});
					}
				}
            }
        },
		error: function(objeto, quepaso, otroobj){
            $('.spiner').hide();
            alert("Se produjo un error: "+quepaso);
        }

	});

}

function traer_nomusuario(userid,perfil) {

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: ruta_app+'seguridad/nomusuario.php',
		cache: false,
		type: "POST",
		scriptCharset: "iso-8859-1",
		data: "userid="+userid+"&perfil="+perfil,
		success: function(datos){
			$("#div_nomusuario").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
			var nomusuario = $('#nomusuario').text();
			var pos = nomusuario.indexOf(":");
			var nomusuario = nomusuario.substring(pos+2);

			$('#div_nomusuario').data("nomusuario",nomusuario);
			$('#div_nomusuario').data("userid",userid);
			$('#div_nomusuario').data("perfil",perfil);
			var fechabk = $('#fechabk').text();
			var diasbk = $('#diasbk').text();
			var nomequipo = $('#nomequipo').text();
			$('#div_nomusuario').data("nomequipo",nomequipo);

			if (perfil == "ADMINISTRADOR" && diasbk > 777)
			{
				var aviso = "ULTIMO BACKUP REALIZADO EL " + fechabk + ".<br>Por su seguridad le recomendamos realizar un nuevo Backup <b>y descargarlo a su PC.</b>";
				$("#id_modal_aviso").html('<span>'+aviso+'</span>');
				$("#modal_aviso").modal('show');

			};

        },
		error: function(objeto, quepaso, otroobj){
            $('.spiner').hide();
            alert("Se produjo un error: "+quepaso);
        }

	});
}

function desloguear() {

	var opcion = $('#div_inicio').data("opcion");

	window.open('./index.php','_self');

	timer =	$('#div_nomusuario').data("timer");
    cierre = clearInterval(timer);
}

function reiniciar_timer() {

	// Eliminar el timer vigente
	timer =	$('#div_nomusuario').data("timer");

    cierre = clearInterval(timer);
    // Iniciar el nuevo timer
	timer = setInterval('desloguear()', 6000000); // 15000 = 15 segundos - 600000 = 10 min
	$('#div_nomusuario').data("timer",timer);
}

function grabarnuevaclave() {
    var idusuario = document.f_abm_renov.rusuarioid.value;
    var perfil = document.f_abm_renov.rperfil.value;
    var nclave = document.f_abm_renov.nclave.value;
    var rclave = document.f_abm_renov.rclave.value;

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'grabarnuevaclave.php',
		cache: false,
		type: "POST",
		data: "idusuario="+idusuario+"&nclave="+nclave+"&rclave="+rclave+"&perfil="+perfil,
        success: function(datos){
			//$("#abm_renov").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
			if(exito=="success"){
		        window.open('../index.php','_self');

            }
        },
		error: function(objeto, quepaso, otroobj){
            $('.spiner').hide();
            alert("Se produjo un error: "+quepaso);
        }
	});
}

/* --------------------------------------------- BACKUP ---------------------------------------------- */
function realizarbackup() {

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'Backup_Database.php',
		cache: false,
		type: "POST",
		success: function(datos){
			$("#div_menubackup").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
				if(exito=="success"){
					registrar_backup();
	            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }

	});
}

function registrar_backup() {

	var userid = $('#div_nomusuario').data("userid");

	$.ajax({
		beforeSend:function() {$('.spiner').show();},
		url: 'seguridad/registrarbackup.php',
		cache: false,
		type: "POST",
		data: "userid="+userid,
		success: function(datos){
			//$("#div_menubackup").html(datos);
		},
        complete: function(objeto, exito){
			$('.spiner').hide();
				if(exito=="success"){
	            }
        },
		error: function(objeto, quepaso, otroobj){
            alert("Se produjo un error: "+quepaso);
        }

	});
}
