
<!-- Hugo Alexander Magaña Magaña 
Calculo de IVA del producto a comprar -->
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
	$parametros=array("codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "precio"=>$_POST["precio"]);
	$result=$client->call("calc_iva",$parametros);
	echo $client->getError();
	//print_r($result);
	if ($result["calculo"]==0) {
		echo "<h1>{$result['calculo']}</h1>";
	}else { 
		echo "<h1>Codigo Producto: {$result['producto']}</h>";
		echo "<h1>Nombre producto: {$result['cargo']}</h1>";
		echo "<h1>Precio:{$result['precio']}</h1>";
		
		
		

	}
}else{
	// porcentajes IVA + cecs
// IVA   13%   
// cecs   5%
          
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo Calculo IVA Producto con webservice</title>
</head>
<!-- formulario introducir los datos del producto -->
<body>
	<form method="post">
		<p>
		Codigo Producto: <input type="number" name="codigo"><br>
		Nombre producto: <input type="text" name ="nombre"><br>
		Precio:          <input type="number" value ="precio"><br>
		<button type="submit" value ="calcular">calcular</button>
		</p>
	</form>
</body>
</html>

<?php
}
?>



