<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cuadrática</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/my_styles.css">
	<link rel="stylesheet" href="../css/my_bs.css">
</head>
<body>
	<div class="contenedor">
		<div class="jumbotron text-dark">
			<h1 class="display-4">Cuadrática</h1>
			<p class="lead">Cálculo de las raíces cuadradas</p>
		</div>
		<form id="FrmCalc" method="post" action="cuad_result.php" class="row row-cols-lg-auto g-3 align-items-center">
			<div class="col-12">
				<label for="a" class="visually-hidden">A</label>
				<input type="text" id="a" name="a" placeholder="A" class="form-control">
			</div>
			<div class="col-12">
				<label for="b" class="visually-hidden">B</label>
				<input type="text" id="b" name="b" placeholder="B" class="form-control">
			</div>
			<div class="col-12">
				<label for="c" class="visually-hidden">C</label>
				<input type="text" id="c" name="c" placeholder="C" class="form-control">
			</div>
			<div class="col-12">
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
	<script type="text/javascript">
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