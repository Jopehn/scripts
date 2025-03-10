<?php
include 'conexion.php';

if (isset($_POST['create'])) {
	$arch=$_FILES['archivo']['name'];
	$tmp=$_FILES['archivo']['tmp_name'];
	if (is_uploaded_file($tmp)) {
		$fullpath='../uploads/'.$arch;
		copy($tmp, $fullpath);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cobros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/my_styles.css">
    <link rel="stylesheet" href="../css/my_bs.css">
</head>
<body>
	<div class="contenedor">
		<div class="jumbotron text-dark">
			<h1 class="display-4">Cobros</h1>
			<p class="lead">Programa de cobros</p>
		</div>
<?php
if ($arch) {
	$fpin=fopen($fullpath, 'r');
	$lines=$suma=0;
?>
		<table class="table table-striped table-hover table-bordered">
<?
	while (($fields=fgetcsv($fpin, 1000, ';'))!==false) {
		$lines++;
		if ($lines>1) {
			$sql="INSERT INTO listados (detalle, cantidad, precio_unitario) VALUES (:detalle, :cantidad, :precio)";
			$sth=$conn->prepare($sql);
			$sth->execute([':detalle'=>$fields[0], ':cantidad'=>$fields[1], ':precio'=>$fields[2]]);
			$subtotal=$fields[1]*$fields[2];
			$suma+=$subtotal;
?>
				<tr class="table-dark">
					<td><? echo $fields[0];?></td>
					<td><? echo $subtotal;?></td>
				</tr>
<?
		}else{
?>
			<thead>
				<tr class="table-primary">
					<th>Detalle</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
<?
		}
	}
?>
			</tbody>
			<tfoot>
				<tr class="table-info">
					<td>Total:</td>
					<td><? echo $suma;?></td>
				</tr>
			</tfoot>
			<caption class="text-light"><?php echo $lines; ?> lines</caption>
		</table>
		<p><a href="destreza.php" class="btn btn-secondary">Ver PDF</a></p>
<?
	fclose($fpin);
}else{
?>
		<div class="alert alert-warning">No se encuentra</div>
<?
}
?>
		<p><a href="javascript:history.back()" class="btn btn-dark">Volver</a></p>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>