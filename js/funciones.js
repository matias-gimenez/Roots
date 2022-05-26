//var ruta_app = 'http://www.califcolegios.com.ar/cdigital/alumno/';
var ruta_app = '';


function ordenar_lista(lista) {

	var listado = $(lista);
	var elementos = listado.children("li").get();
	elementos.sort(function(a,b) {
		var A = $(a).text().toUpperCase();
		var B = $(b).text().toUpperCase();
 		return (A < B) ? -1 : (A > B) ? 1 : 0;
	});
	$.each(elementos, function(id, elemento) {
		listado.append(elemento);
	});
}

function convert_fecha(fecha) {
	if(fecha != "")
	{
		var pos1 = fecha.indexOf("/",0);
		var pos2 = fecha.indexOf("/",pos1+1);
		var dia = fecha.substring(0,pos1);
		var mes = fecha.substring(pos1+1,pos2);
		var anio = fecha.substring(pos2+1,pos2+5);
		//if(parseInt(dia)<10){dia = "0"+dia};
		//if(parseInt(mes)<10){mes = "0"+mes};
		var nuevafecha = anio+"/"+mes+"/"+dia;
	}
	else
	{var nuevafecha = "";}
	return nuevafecha;
}

function convert_fecha_opc1(fecha) {
	if(fecha != "")
	{
		var pos1 = fecha.indexOf("-",0);
		var pos2 = fecha.indexOf("-",pos1+1);
		var dia = fecha.substring(0,pos1);
		var mes = fecha.substring(pos1+1,pos2);
		var anio = fecha.substring(pos2+1,pos2+5);
		//if(parseInt(dia)<10){dia = "0"+dia};
		//if(parseInt(mes)<10){mes = "0"+mes};
		var nuevafecha = anio+"-"+mes+"-"+dia;
	}
	else
	{var nuevafecha = "";}
	return nuevafecha;
}

// De yyyy-mm-dd => dd/mm/yyyy
function convert_fecha_opc2(fecha) {
	if(fecha != "")
	{
		var pos1 = fecha.indexOf("-",0);
		var pos2 = fecha.indexOf("-",pos1+1);
		var anio = fecha.substring(0,pos1);
		var mes = fecha.substring(pos1+1,pos2);
		var dia = fecha.substring(pos2+1,pos2+3);
		//if(parseInt(dia)<10){dia = "0"+dia};
		//if(parseInt(mes)<10){mes = "0"+mes};
		var nuevafecha = dia+"/"+mes+"/"+anio;
	}
	else
	{var nuevafecha = "";}
	return nuevafecha;
}

function fecha_hoy(opc) {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;//January is 0!
	var yyyy = today.getFullYear();
	if(dd<10){dd='0'+dd};
	if(mm<10){mm='0'+mm};
	if(opc == 1){var fecha = dd+'/'+mm+'/'+yyyy;};
	if(opc == 2){var fecha = yyyy+'-'+mm+'-'+dd;};

	return fecha;
}

function ingresar(olvido) {
	if($('#div_inicio').data("cambios")==2){return;}; // Para evitar varios clicks

	$('#div_inicio').data("cambios",2);
	$('#div_inicio').data("olvido",olvido);
	$('#div_acceso').load("seguridad/acceso.php");
}

function goMsgError(msg_error) {
	$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
	$("#modal_aviso").modal('show');
	return false;
}

function alertar(msg_error) {
	$("#id_modal_aviso").html('<span>'+msg_error+'</span>');
	$("#modal_aviso").modal('show');
	return false;
}

function permite(elEvento, permitidos) {
	// Variables que definen los caracteres permitidos
	var calif = "0123456789aAuU";
	var calif1 = "aApPdDuU";
	var calif2 = "aApPdDuU";
	var numeros = "0123456789";
	var reales = "0123456789.-";
	var caracteres = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ()=+-*/{}[]-_;,.:<>áéíóú@&";
	var numeros_caracteres = numeros + caracteres;
	var teclas_especiales = [8, 37, 39, 13,  9, 225, 233, 237, 243, 250, 193, 201, 205, 211, 218, 209, 241];
	var teclas_especiales = [13];
	// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
	// 9 = Tab, 13 = Enter, 209=ñ, 241=Ñ


	// Seleccionar los caracteres a partir del parámetro de la función
	switch(permitidos) {
		case 'num':
			permitidos = numeros;
			break;
		case 'num_real':
			permitidos = reales;
			break;
		case 'car':
			permitidos = caracteres;
			break;
		case 'num_car':
			permitidos = numeros_caracteres;
			break;
		case 'calif':
			permitidos = calif;
			break;
		case 'calif1':
			permitidos = calif1;
			break;
		case 'calif2':
			permitidos = calif2;
			break;

	}

	// Obtener la tecla pulsada
	var evento = elEvento || window.event;
	var codigoCaracter = evento.charCode || evento.keyCode;
	var caracter = String.fromCharCode(codigoCaracter);

	// Comprobar si la tecla pulsada es alguna de las teclas especiales
	// (teclas de borrado y flechas horizontales)
	var tecla_especial = false;

	for(var i=0;i<=17;i++) {
		if(codigoCaracter == teclas_especiales[i]) {
			tecla_especial = true;
			break;
		}
	}

;
	// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
	// o si es una tecla especial
	return permitidos.indexOf(caracter) != -1 || tecla_especial;
}


function replaceall(text, search, newstring ){
    while (text.toString().indexOf(search) != -1)
        text = text.toString().replace(search,newstring);
    return text;
};


sumaFecha = function(d, fecha)
{
	var sFecha = fecha;
	var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
	var aFecha = sFecha.split(sep);
	var fecha = aFecha[0]+'/'+aFecha[1]+'/'+aFecha[2];
	fecha= new Date(fecha);
	fecha.setDate(fecha.getDate()+parseInt(d));
	var anno=fecha.getFullYear();
	var mes= fecha.getMonth()+1;
	var dia= fecha.getDate();
	mes = (mes < 10) ? ("0" + mes) : mes;
	dia = (dia < 10) ? ("0" + dia) : dia;
	var fechaFinal = anno+sep+mes+sep+dia;
	return (fechaFinal);
 }


// Función para calcular los días transcurridos entre dos fechas
restaFechas = function(f1,f2)
{
	var aFecha1 = f1.split('/'); 
	var aFecha2 = f2.split('/'); 
	var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
	var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
	var dif = fFecha2 - fFecha1;
	var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
	return dias;
 }