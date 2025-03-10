<?php
if (isset($_POST['calc'])) {
	$numero=$_POST['numero'];
	if ($numero==0) {
		echo "<div class='alert alert-warning'>No hay datos</div>";
	}else{
?>
<form id="FrmCalculo" method="post" action="stad_result.php">
	<input type="hidden" name="numeros" value="<? echo $numero;?>">
<?
		for ($i=0; $i < $numero; $i++) { 
?>
	<div class="row mb-3">
		<label for="numero<? echo $i;?>" class="col-sm-2 col-form-label">Número <? echo $i+1;?></label>
		<div class="col-sm-10">
			<input type="text" id="numero<? echo $i;?>" name="numero<? echo $i;?>" class="form-control">
		</div>
	</div>
<?
		}
?>
	<button type="submit" name="calculo" class="btn btn-primary">Calcular</button>
	<button type="reset" class="btn btn-light">Limpiar</button>
</form>
<div id="resultado"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#FrmCalculo').ajaxForm({
			target: '#resultado',
			beforeSubmit: function(formData, jqForm){
				for (var i = 0; i < formData.length-1; i++) {
					if(! formData[i].value){
						$('#resultado').html('');
						alert('Campos vacíos!');
						return false;
					}
				}
			}
		});
	});
</script>
<?
	}
}
?>