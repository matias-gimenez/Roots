<?
	include '../conexion.php';

	$query = "SELECT  id, descripcion FROM    codificadores WHERE   idcodificador=1 AND     habilitado =2 AND     fhbaja IS NULL ORDER BY descripcion";

	$sel_prov=mysqli_query ($con,$query) or die(mysqli_error($con));

	echo "<select name='n_rubro' id='i_rubro' class='form-control' onchange=''> ";
	echo "<option value='0' checked>Seleccionar</option>";
	while ($row = mysqli_fetch_array($sel_prov,MYSQLI_NUM))
	{
		echo '<option value= "'.$row[0].'">'.$row[1].'</option>';
	}
	echo '</select>';
	$res = mysqli_close($con);
?>