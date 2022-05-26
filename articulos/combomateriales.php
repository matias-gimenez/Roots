<?
	include '../conexion.php';

	$query = "SELECT distinct id,nombre FROM materiales  where fhbaja IS NULL  order by nombre";

	$sel_prov=mysqli_query ($con,$query) or die(mysqli_error($con));

	echo "<select name='n_cursos' id='i_materiales' class='form-control' onchange=''> ";
	echo "<option value='0' checked>Seleccionar</option>";
	while ($row = mysqli_fetch_array($sel_prov,MYSQLI_NUM))
	{
		echo '<option value= "'.$row[0].'">'.$row[1].'</option>';
	}
	echo '</select>';
	$res = mysqli_close($con);
?>