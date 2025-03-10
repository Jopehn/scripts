<?php
if (isset($_POST['create'])) {
	$directory=$_POST['directory'];
	$number=$_POST['numero'];
	if ($number>0) {
?>
<form id="Frm_musicList" method="post" action="music_result.php">
	<input type="hidden" name="numbers" value="<? echo $number;?>">
	<input type="hidden" name="dir" value="<? echo $directory;?>">
<?
		for ($i=0; $i < $number; $i++) { 
?>
	<div class="row mb-3">
		<label for="music<? echo $i;?>" class="col-sm-2 col-form-label">Music <? echo $i+1;?></label>
		<div class="col-sm-10">
			<input type="text" id="music<? echo $i;?>" name="music<? echo $i;?>" class="form-control">
		</div>
	</div>
<?
		}
?>
	<button type="submit" name="crear_lista" class="btn btn-primary">Crear lista</button>
	<button type="reset" class="btn btn-light">Limpiar</button>
</form>
<div id="resultado"></div>
<script>
	$(document).ready(function(){
		$('#Frm_musicList').ajaxForm({
			target: '#resultado',
			beforeSubmit: function(formData, jqForm){
				for (var i = 0; i < formData.length-1; i++) {
					if(! formData[i].value){
						alert('Empthy fields!');
						$('#resultado').html('');
						return false;
					}
				}
			}
		});
	});
</script>
<?
	}else{
		echo "<div class='alert alert-warning'>No hay items</div>";
	}
}
?>