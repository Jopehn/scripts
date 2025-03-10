<?php
include 'point.php';
if (isset($_POST['calc'])) {
	$x1=$_POST['x1'];
	$y1=$_POST['y1'];
	$x2=$_POST['x2'];
	$y2=$_POST['y2'];
	if (is_numeric($x1) and is_numeric($y1) and is_numeric($x2) and is_numeric($y2)) {
		$p1=new Point($x1, $y1);
		$p2=new Point($x2, $y2);
		echo "Distancia: ",$p1->dist($p2);
	}else{
		echo "<div class='alert alert-danger'>Los campos no son numéricos</div>";
	}
}
?>