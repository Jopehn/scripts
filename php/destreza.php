<?php
include '../fpdf186/fpdf.php';
include 'conexion.php';

$pdf=new FPDF('P', 'cm');
$pdf->SetFont('Arial', '', 10);
$pdf->AddPage();
$pdf->SetFillColor(207, 226, 255);
$pdf->Cell(10, 1, 'Detalle', 1, 0, 'L', 1);
$pdf->Cell(5, 1, 'Subtotal', 1, 0, 'L', 1);
$pdf->Ln();
$sql="SELECT * FROM listados";
$suma=0;
foreach ($conn->query($sql) as $row) {
	$subtotal=$row['cantidad']*$row['precio_unitario'];
	$suma+=$subtotal;
	$pdf->Cell(10, 1, $row['detalle'], 1);
	$pdf->Cell(5, 1, $subtotal, 1, 0, 'R');
	$pdf->Ln();
}
$pdf->SetFillColor(207, 244, 252);
$pdf->Cell(10, 1, 'Total',1, 0, 'R', 1);
$pdf->Cell(5, 1, $suma, 1, 0, 'R', 1);
$pdf->Output('I', 'destreza.pdf');
?>