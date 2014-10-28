
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>

<?php

//ejemplo de entrada ( localhost/practica/?dirx=variablesX.csv&diry=variableY.csv&alfa=0.01&iter=100&tole=0.001 )

$dirX = $_GET["dirx"];
$dirY = $_GET["diry"];
$alfa = $_GET["alfa"];
$iter = $_GET["iter"];
$tole = $_GET["tole"];
require_once "./ejecutador.php";
$res = new ejecutador();
$listaX = $res->leerArchivo($dirX);

echo "Valor de m: ".$res->getValorM() . "<br>";
$valM = $res->getValorM();


$listaY = $res->leerArchivo($dirY);


$res->llenarVariablesX($listaX);
$res->llenarVariablesY($listaY);

echo "Valor de n: ".$res->getValorN() . "<br>";

$valN = $res->getValorN();
$res->ejecutador($valM,$valN,$iter,0.1,$alfa,$tole);


/*
$texto = "";
		$file = fopen("./variablesX.csv", "r");
		while(!feof($file)) {
			//echo fgets($file). "<br />";
			$texto .= fgets($file);
		}
		fclose($file);
		echo $texto;
*/
?>




</body>
</html>
