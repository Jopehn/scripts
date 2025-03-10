<?php
if (isset($_POST['crear_lista'])) {
	$number=$_POST['numbers'];
	$directory=$_POST['dir'];
	$numbers=[];
	$file='../music.m3u';
	$fplog=fopen($file, 'w');
	for ($i=0; $i < $number; $i++) { 
		$temp='music'.$i;
		$elem=$_POST[$temp];
		$str="Games\\".$directory."\\Sound\\".$elem."\n";
		fwrite($fplog, $str);
	}
	fclose($fplog);
	echo "Done!";
}
?>