<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estadística</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/my_styles.css">
    <link rel="stylesheet" href="../css/my_bs.css">
</head>
<body>
	<div class="contenedor">
		<div class="jumbotron text-dark">
			<h1 class="display-4">Estadística</h1>
			<p class="lead">Cálculo de la estadística</p>
		</div>
		<form id="FrmCalc" method="post" action="stadistic.php" class="row row-cols-lg-auto g-3 align-items-center">
			<div class="col-12">
				<label class="visually-hidden">Items</label>
				<input type="number" id="numero" name="numero" placeholder="Items" min="0" class="form-control">
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
    				var form=jqForm[0];
    				if (! form.numero.value) {
    					$('#result').html('');
    					alert('Campo vacío!');
    					return false;
    				}
    			}
    		});
    	});
    </script>
</body>
</html>