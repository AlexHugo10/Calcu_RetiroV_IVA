

<!-- Hugo Alexander Magaña Magaña 
Calculo de indennizacion del trabajador por retiro voluntarido -->
<?php
date_default_timezone_set("America/El_Salvador");
require_once("nusoap/lib/nusoap.php");
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn:server';
$server->register('calc_retiro_voluntario',
		array('usuario'=>'xsd:string'),
		array('return'=>'xsd:string'),
		'urn:server',
		'urn:server#holaServer',
		'rpc',
		'encoded',
		'Funcion calc_retiro_voluntario');
//elemento complextype
$server->wsdl->addComplexType(
'persona',
'complexType',
'struct',
'all',
'',
array(
	'empleado'=>array('name'=>'empleado','type'=> 'xsd:text'),
	'cargo'=>array('name'=>'cargo','type'=>'xsd:string'),
	'sueldo'=>array('name'=>'sueldo','type'=>'xsd:string'),
	'anos'=>array('name'=>'anos','type'=>'xsd:string'),
	'giro'=>array('name'=>'giro','type'=>'xsd:string'))
);
$server->register(
'login',
array('empleado'=>'xsd;string','cargo'=>'xsd:string'),
array('return'=>'tns:Persona'),
'urn:server',
'urn:server#calc_retiro_voluntarioServer',
'rpc',
'encoded',
'Funcion para validar retiro'
);

//la funcion hace el calculo

function calc_retiro_voluntario($empleado,$cargo, $sueldo, $anos, $giro ){
	$quice=$salario/2;
	if ($quince<=251.70) {
		$quince=251.70;
		$anual=$quince*24;
	} else {
		$resultado=array(
			'empleado'=>"",
			'cargo'=>"",
			'sueldo'=>"",
			'anos'=>"",
			'giro'=>"");
	}
	return $resultado;
}
// donde realiza el calculo del iva
function iva($codigo, $nombre, $precio){
	if $iva=$precio*0.18;{
	   $PrecioProd=$precio*$iva;
	} else {
		$resul=array{  
			'codigo'=>"",
			'nombre'=>"",
			'precio'=>"")
}
	return $resul
}

$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
//$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents('php://input'));
?>