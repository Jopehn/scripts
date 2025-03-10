<?php
/**
 * Cuadrática
 */
class Quad
{
	public float $a, $b, $c;
	function __construct(float $a, float $b, float $c)
	{
		$this->a=$a;
		$this->b=$b;
		$this->c=$c;
	}
	public function dist():float
	{
		return ($this->b**2)-4*$this->a*$this->c;
	}
}
?>