<?php
include 'mathematics.php';

if (isset($_POST['calc'])) {
	$num=$_POST['num'];
	if (is_numeric($num)) {
?>
<table class="tabla">
	<thead>
		<tr>
			<th>Num</th>
			<th>Square</th>
			<th>Factorial</th>
		</tr>
	</thead>
	<tbody>
<?
		for ($i=0; $i <= $num; $i++) { 
?>
		<tr>
			<td align="right"><? echo $i;?></td>
			<td align="right"><? echo sqr($i);?></td>
			<td align="right"><? echo fact($i);?></td>
		</tr>
<?
		}
?>
	</tbody>
</table>
<?
	}else{
		echo "<div class='alert alert-danger'>No es numérico</div>";
	}
}
?>