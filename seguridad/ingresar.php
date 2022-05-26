<?php
	include '../conexion.php';
	$opcion = $_POST['opcion'];
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	$olvido = $_POST['olvido'];

    $query = "CALL validarusuario(".$opcion.",'".$email."','".$clave."',".$olvido.")";
	$respuesta=mysqli_query ($con,$query) or die(mysqli_error($con));
?>

<script>
$(document).ready(function(){
	// Registracion
	$("#ingreso").click(function(){
		ingresar(0);
	});

	$("#bolvido").click(function(evento){
		evento.preventDefault();
    	ingresar(1);
	});


});

</script>

<? $row = mysqli_fetch_array($respuesta,MYSQLI_NUM);
$resp = $row[0];
$usuid = $row[1];
$mensaje = $row[2];
$perfil = $row[3];
$email = $row[4];


IF ($resp == 0)
{			
	include 'registro_plus.php';
}?>

<?IF ($resp == -1){include 'email_renovclave.php';}?>

<?IF ($resp == 1){?>
<form name="f_registro" id="id_registro">
	<table class="t_registro">
		<tr>
			<td><INPUT TYPE="hidden" NAME="userid" id="userid" value="<?= $usuid;?>"></td>
			<td><INPUT TYPE="hidden" NAME="perfil" id="perfil" value="<?= $perfil;?>"></td>
			<td><INPUT TYPE="hidden" NAME="reg_mensaje" id="reg_mensaje" value="<?= $mensaje;?>"></td>
			<td><INPUT TYPE="hidden" NAME="reg_resp" id="reg_resp" value="<?= $resp;?>"></td>
		</tr>
	</table>
</form>

<? }?>

