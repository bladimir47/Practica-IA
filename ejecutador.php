<?php

class ejecutador {
    public $valorM = 0;
	public $valorN = 0;
	public $varXi = array();
	public $varYi = array();
    public function __construct( /*...*/ ) {
        
    }
   
    public function leerArchivo($dir){
		$texto = "";
		global $valorM;
		$file = fopen($dir, "r");
		while(!feof($file)) {
			//echo fgets($file). "<br />";
			$texto .= fgets($file).";";
			$valorM = $valorM + 1;
		}
		fclose($file);
		return $texto;
	}
	
	public function llenarVariablesX($lista){
		//global $varXi;
		global $valorN;
		$aux1 = explode(";",$lista);
		for($i = 0;$i < count($aux1)-1;$i++){
			$aux2 = explode(",", $aux1[$i]);
			$valorN = count($aux2);
			for($j = 0;$j < count($aux2);$j++){
				//$aux3 = $aux2[$j];
				$this->varXi[] = $aux2[$j];
			}
		}
		for($k = 0;$k < count($this->varXi); $k++){
			echo $this->varXi[$k]. "<br />";
		}
		
	}
	
	public function llenarVariablesY($lista){
		//global $varXi;
		global $valorN;
		$aux1 = explode(";",$lista);
		for($i = 0;$i < count($aux1)-1;$i++){
			$this->varYi[] = $aux1[$i];
		}
		for($k = 0;$k < count($this->varYi); $k++){
			echo $this->varYi[$k]. "<br />";
		}
		
	}
	
	
	
	public function getValorM(){
		global $valorM;
		return $valorM;
	}
	
	public function getValorN(){
		global $valorN;
		return $valorN;
	}
	
	
	
	
	
	
   
    public function ejecutador( $valM, $valN,$numIter,$tetaInicial,$alfa,$tolerancia ) {
        $tetas[]= array();
		$textoGeneral = "";
		//llenando tetas
		for($i=0; $i< $valN; $i++){
			$tetas[$i] = $tetaInicial;
		}
		//for para las iteraciones
		for($i=0; $i< $numIter; $i++){
			//for para el almacenamiento de tetas y el cambio de las i
			for($j=0; $j< $valN; $j++){
				//iteraciones de la sumatoria
				$auxAlmaSum = 0;
				$incre = 0;
				for($k=0;$k<$valM ; $k++){
					//recorrer los tetas y las X
					$auxAlmaTX = 0;
					for($l=0; $l< $valN ; $l++){
						$auxAlmaTX = $auxAlmaTX + ($tetas[$l] * $this->varXi[$incre]);
						$incre = ($incre) + 1;		
					}
					
					
					$auxAlmaTX = $auxAlmaTX - $this->varYi[$k];
					$auxIncre = $incre;
					$auxIncre = $auxIncre - $valN;
					$auxIncre = $auxIncre + $j;
					$auxAlmaTX = $auxAlmaTX * $this->varXi[$auxIncre];
					$auxAlmaSum = $auxAlmaSum + $auxAlmaTX;
					
				}
				

				$auxAlmaSum = (1/$valM) * $auxAlmaSum;
				$auxAlmaSum = $alfa * $auxAlmaSum;
				$auxAlmaSum = $tetas[$j] - $auxAlmaSum;
				$tetas[$j] = $auxAlmaSum;
				echo "teta: ".$j."valor :".$tetas[$j]."en iteracion: ".$i."<br>";
				$textoGeneral .= "teta: ".$j." valor :".$tetas[$j]." en iteracion: ".($i+1)."\r\n";
				if($tetas[$j] <= $tolerancia){
					$i = $numIter;
					echo "DETENIDO <br>";
					$textoGeneral .= "DETENIDO POR TOLERANCIA\n";
				}
				
			}	
				
			$textoGeneral .= "\r\n";
			
		}
		
		$fp = fopen("resutaldo.txt", "w");
		fputs($fp, $textoGeneral);
		fclose($fp);
		
		echo "FIN--- archivo resultado.txt creado en la carpeta adjunta al programa";
		
    }
	
	
	
	
	
	
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
</body>
</html>
