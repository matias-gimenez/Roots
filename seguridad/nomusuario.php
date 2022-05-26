<?php
	include '../conexion.php';
	$userid = $_POST['userid'];
	$perfil = $_POST['perfil'];

    $query = "CALL nomusuario(".$userid.",'".$perfil."')";
	$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($datos,MYSQL_ASSOC);
	$usuario = $row['usuario'];
sleep(1);
?>

<span class="texto3_bl" id="nomusuario"><?= $usuario;?></span>
<span style="display:none" id="fechabk"><?= $row['fechabk'];?></span>
<span style="display:none" id="diasbk"><?= $row['diasbk'];?></span>
<span style="display:none" id="nomequipo"><?= $row['equipo'];?></span>
