
<!-- Hugo Alexander Magaña Magaña 
Calculo de indennizacion del trabajador por retiro voluntarido -->
<?php
if (isset($_POST["usuario"])){
	date_default_timezone_set("America/El_Salvador");
	require_once("nusoap/lib/nusoap.php");
	$wsdl="http://localhost/calc/ws.php?wsdl";
	$client=new nusoap_client($wsdl, "wsdl");
	$err=$client->getError();
	if ($err) {
		echo "<h1>Error  de conexion</h1>";
		exit(0);
	}
	$parametros=array("empleado"=>$_POST["empleado"], "cargo"=>$_POST["cargo"], "sueldo"=>$_POST["sueldo"], "anos"=>$_POST["anos"], "giro"=>$_POST["giro"]);
	$result=$client->call("calculo_retiro_vol",$parametros);
	echo $client->getError();
	//print_r($result);
	if ($result["calculo"]==0) {
		echo "<h1>{$result['calculo']}</h1>";
	}else { 
		echo "<h1>Nombre Empleado:{$result['empleado']}</h>";
		echo "<h1>Cargo:{$result['cargo']}</h1>";
		echo "<h1>Sueldo:{$result['sueldo']}</h1>";
		echo "<h1>Anos trabajo:{$result['anos']}</h1>";
		echo "<h1>Giro empresa:{$result['giro']}</h1>";
		
		

	}
}else{
	//suldos el salvador
// comercio   $251.70     dia $8.39    
// Industria  $246.60     dia $8.22
// Maquila    $210.90     dia $7.03
// Agricola   $118.20     dia $3.94            
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo Calculo Retiro Voluntario con webservice</title>
</head>
<!-- formulario introducir los datos de usuarios -->
<body>
	<form method="post">
		<p>
		Nombre Empleado: <input type="text" name="empleado"><br>
		Cargo empleado: <input type="text" name ="cargo"><br>
		sueldo: <input type="number" value ="sueldo"><br>
		Anos trabajo: <input type="number" value ="anos"><br>
		Giro de la Empresa:
		<select name="giro">
			<option>Comercio</option>
			<option>Industria</option>
			<option>Textil</option>
			<option>agricola</option>
			</select><br>
		
		<button type="submit" value ="calcular">calcular</button>
		</p>
	</form>
</body>
</html>

<?php
}
?>



