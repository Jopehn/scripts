<?php
include 'quad.php';
if (isset($_POST['calc'])) {
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	if (is_numeric($a) and is_numeric($b) and is_numeric($c)) {
		$quad=new Quad($a, $b, $c);
		if ($a==0) {
			echo "<div class='alert alert-warning'>A no es cero</div>";
		}else{
			$diff=(float) ($quad->dist());
			$x0=(-$quad->b)/(2*$quad->a);
			$y0=$quad->a*$x0**2+$quad->b*$x0+$quad->c;
			if ($diff>0) {
				$x1=((-$quad->b)+sqrt($diff))/(2*$quad->a);
				$x2=((-$quad->b)-sqrt($diff))/(2*$quad->a);
				echo "<p>X1: ",$x1,"</p>";
				echo "<p>X2: ",$x2,"</p>";
			}elseif ($diff==0) {
				$x=(-$quad->b)/(2*$quad->a);
				echo "<p>X: ",$x,"</p>";
			}else{
				echo "<div class='alert alert-warning'>Raíces imaginarias</div>";
			}
			echo "<p>X0: ",$x0,"</p>";
			echo "<p>Y0: ",$y0,"</p>";
		}
	}else{
		echo "<div class='alert alert-danger'>No son númericos</div>";
	}
}
?>