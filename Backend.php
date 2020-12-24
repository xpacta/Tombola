<?php

include("Conexion.php");
header('Content-Type: application/json');
function concursantes() {
    include("Conexion.php");
    $consulta = MySQLi_query($Conexion, "SELECT * FROM CONCURSANTES where Ganador = 0") OR die("Error en el Querry nuevo_concursante");
	return $consulta;
}

function premios() {
    include("Conexion.php");
    $consulta = MySQLi_query($Conexion, "SELECT * FROM REGALOS where Ganador = 0") OR die(MySQLi_errno()."Error en el Querry nuevo_premio");
    return $consulta;
}

function get_premio() {
	$premio;
	$ResultPremios =  premios();
	$CantidadDePremios = MySQLi_num_rows($ResultPremios);
	if($CantidadDePremios != 0){
		MySQLi_data_seek($ResultPremios, rand(0, $CantidadDePremios));
		$premio = MySQLi_fetch_array($ResultPremios);
	}else{
		$premio = 0;
	}
	
	return $premio;
}

function get_concursante(){
	$Concursante;
	$ResultConcursantes = concursantes();
	$CantidadDeConcursantes = MySQLi_num_rows($ResultConcursantes);
	if ($CantidadDeConcursantes != 0){
	MySQLi_Data_Seek($ResultConcursantes, rand(0, $CantidadDeConcursantes));
	$Concursante = MySQLi_Fetch_Array($ResultConcursantes);
	}else{
	$Concursante = 0;
	}
	return $Concursante;
}

function GuardarGanador($Concursante, $Premio){
	include("Conexion.php");
	$resp = false;
	$afectedRows = 0;
	MySQLi_query($Conexion, "UPDATE `concursantes` SET `Ganador`= 1, `Time`=NOW()  WHERE `Id`= ".$Concursante['Id'])or die("error asegurando ganador");
	$afectedRows += MySQLi_Affected_Rows($Conexion);
	MySQLi_query($Conexion, "Update regalos set Ganador = " . $Concursante['Nomina'] . " where Id = " . $Premio['Id'])or die("error asegurando el premio");
	$afectedRows += MySQLi_Affected_Rows($Conexion);

	if( $afectedRows == 2 ){
		$resp = true;
	}

	return $resp;
}

$Response;
$Premio = get_premio();
$Concursante = get_concursante();
if($Premio === 0 || $Concursante === 0){
	$Response = "No hay regalos disponibles, El sorteo ha finalizado.";
}else{
	if(GuardarGanador($Concursante, $Premio)){
	
	$Response = array('Success' => 1, 'Concursante' => $Concursante['Nombre'],'Gano' => $Premio['Regalo'], 'Id' => $Concursante['Id']);
	
	}else{
	$Response = array('Success' => 1, 'Concursante' => "ERROR COMSULTE EL BACKEND",'Gano' => "ERROR", 'Id' => "0");	
	}
}
echo json_encode($Response);

MySQLi_close($Conexion);
?>