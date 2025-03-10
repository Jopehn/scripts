<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Punto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/my_styles.css">
	<link rel="stylesheet" href="../css/my_bs.css">
</head>
<body>
	<div class="contenedor">
		<div class="jumbotron text-dark">
			<h1 class="display-4">Punto</h1>
			<p class="lead">Cálculo de la distancia</p>
		</div>
		<form id="FrmCalc" method="post" action="point_result.php" class="row g-3">
			<div class="col-md-6">
				<label for="x1" class="form-label">X1</label>
				<input type="text" id="x1" name="x1" class="form-control">
			</div>
			<div class="col-md-6">
				<label for="y1" class="form-label">Y1</label>
				<input type="text" id="y1" name="y1" class="form-control">
			</div>
			<div class="col-md-6">
				<label for="x2" class="form-label">X2</label>
				<input type="text" id="x2" name="x2" class="form-control">
			</div>
			<div class="col-md-6">
				<label for="y2" class="form-label">Y2</label>
				<input type="text" id="y2" name="y2" class="form-control">
			</div>
			<div class="col-md-12">
				<button type="submit" name="calc" class="btn btn-primary">Calcular</button>
				<button type="reset" class="btn btn-light">Limpiar</button>
			</div>
		</form>
		<div id="result"></div>
		<p><a href="javascript:history.back()" class="btn btn-dark">Volver</a></p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://malsup.github.io/jquery.form.js"></script>
	<script>
		$(document).ready(function(){
			$('#FrmCalc').ajaxForm({
				target: '#result',
				beforeSubmit: function(formData, jqForm){
					for (var i = 0; i < formData.length-1; i++) {
						if(formData[i].value===''){
							alert('Campos vacíos');
							$('#result').html('');
							return false;
						}
					}
				}
			});
		});
	</script>
</body>
</html>