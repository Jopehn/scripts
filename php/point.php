<?php
/**
 * Point
 */
class Point
{
	protected float $x, $y;
	function __construct(float $x, float $y)
	{
		$this->x=$x;
		$this->y=$y;
	}
	public function dist($p)
	{
		$dist1=$this->x-$p->x;
		$dist2=$this->y-$p->y;
		return sqrt($dist1**2+$dist2**2);
	}
}
?>