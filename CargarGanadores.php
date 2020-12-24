<?php
include("Conexion.php");
header('Content-Type: application/json');
$Response = array();
$consulta = mysqli_query($Conexion, "select * from concursantes as c INNER JOIN regalos as r on r.Ganador = c.Nomina order by Time ASC") OR die("Error en el Querry Ganadores.php");
$contador = 0;
while($datos = mysqli_fetch_array($consulta)){
$contador++;
array_push($Response, array('Numero' => $contador,'Nomina' => $datos['Nomina'], 'Nombre' => $datos['Nombre'], 'Premio' => $datos['Regalo']));
}
echo json_encode($Response);
?>