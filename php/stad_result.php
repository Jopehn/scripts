<?php
include 'stadistics.php';

if (isset($_POST['calculo'])) {
	$numeros=$_POST['numeros'];
	$numbers=[];
	for ($i=0; $i < $numeros; $i++) { 
		$numero=$_POST['numero'.$i];
		if (is_numeric($numero)) {
			$numbers[$i]=$numero;
		}else{
			echo "<div class='alert alert-danger'>No es numérico</div>";
			break;
		}
	}
	echo "<p>Promedio: ", promedio($numbers),"</p>";
	echo "<p>Desviación estandar: ", desv_est($numbers),"</p>";
	if (count($numbers)>1) {
		echo "<p>Varianza: ", varianza($numbers),"</p>";
	}
}
?>