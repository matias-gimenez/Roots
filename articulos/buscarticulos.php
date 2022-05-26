<?
include '../conexion.php';

//defino una clase que voy a utilizar para generar los elementos sugeridos en autocompletar
class ElementoAutocompletar {
   var $value;
   var $label;
   var $id;

   function __construct($label, $value, $id){
      $this->label = $label;
      $this->value = $value;
      $this->id = $id;
   }
}

//recibo el dato que deseo buscar sugerencias
$datoBuscar = $_GET["term"];

$query = 'CALL buscardatosarticulos ("'.$datoBuscar.'")';

$datos=mysqli_query ($con,$query) or die(mysqli_error($con));

//creo el array de los elementos sugeridos
$arrayElementos = array();

//bucle para meter todas las sugerencias de autocompletar en el array
while ($row = mysqli_fetch_array($datos,MYSQL_NUM)){
   array_push($arrayElementos, new ElementoAutocompletar($row[0], $row[1], $row[2]));
}

print_r(json_encode($arrayElementos));

?>