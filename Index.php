<?php
	include("Conexion.php");
$results = 0;
if(isset($_GET['Nomina'])){

	$invitado = $_GET['Nomina'];
	$consulta = mysqli_query($Conexion, "SELECT * FROM invitados WHERE Nomina = $invitado") Or die("Error al consultar invitados");
	$results = mysqli_num_rows($consulta);
}
?>
<html>
<head>
<title>Registro a tombola.</title>
</head>
<body>
<center><p>Antes de registrar vefica que la persona cumpla con las politias para participar en el sorteo.</p></center>
<form>
<center>
<label>Nomina</label><input name="Nomina" type="nummber" /><input value="Registrar" type="submit"><br></form>
</center>
<?php
if($results > 0){
	$registrar = mysqli_query($Conexion, "UPDATE `invitados` SET `asistio`= 1 WHERE `Nomina`= $invitado") or die("Error al registrar registro");
	$Invitado = mysqli_fetch_row($consulta);
	$Nomina = $Invitado[0];
	echo $Invitado[0].", ".$Invitado[1].", ".$Invitado[2].", ".$Invitado[3].", ".$Invitado[4];
	if($Invitado[4] == "APLICA"){
	mysqli_query($Conexion, "INSERT INTO `concursantes`(`Nomina`, `Nombre`, `Ganador`) VALUES ($Nomina,'".$Invitado[1]."',0)");
	}
}else{
	"usuario no encontrado.";
}
?>
<table width = "100%">
<tr>
<td>
#
</td>
<td>
Nomina
</td>
<td>
Nombre
</td>
</tr>
<?php
$i=1;
$consulta = mysqli_query($Conexion, "SELECT * FROM invitados WHERE asistio = 1");
while($Invitados = mysqli_fetch_array($consulta)){
echo "
<tr>
<td>".
  $i++.
"</td>
<td>".
 $Invitados['Nomina'].
"</td>
<td>".
$Invitados['Nombre'].
"</td>
</tr>";

}
?>
</table>
</body>
</html>