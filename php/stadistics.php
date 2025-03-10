<?php
function promedio(array $list):float
{
	$n=count($list);
	$suma=0;
	foreach ($list as $elem) {
		$suma+=$elem;
	}
	return $suma/$n;
}
function desv_est(array $list):float
{
	$n=count($list);
	$prom=promedio($list);
	$suma=0;
	foreach ($list as $elem) {
		$suma+=($elem-$prom)**2;
	}
	return sqrt($suma/$n);
}
function varianza(array $list):float
{
	$n=count($list);
	$prom=promedio($list);
	$suma=0;
	foreach ($list as $elem) {
		$suma+=($elem-$prom)**2;
	}
	return sqrt($suma/($n-1));
}
?>