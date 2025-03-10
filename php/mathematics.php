<?php
function sqr(float $num):float
{
	return $num*$num;
}

function fact(int $num):int
{
	$f=1;
	for ($i=2; $i <= $num; $i++) { 
		$f*=$i;
	}
	return $f;
}
?>