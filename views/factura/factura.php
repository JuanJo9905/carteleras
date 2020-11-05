<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Carteleras GQ',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada


$pdf = new PDF();
/*Problemas para recibir la info por medio de POST
require './views/main/comprar.php';
$nombre  = $_POST['nombre'];
$cantidad= $_POST['cantidad'];
$total   = $_POST['total'];
*/
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Cell(0,10,utf8_decode('Juan José González Quintero®'),0,1,'C');
$pdf->Cell(0,10,'www.MisCarteleras.com',0,1,'C');
$pdf->Cell(0,10,'NIT: 109.497.518-3 ',0,1,'C');
$pdf->Cell(0,10,'REGIMEN COMUN',0,1,'C');
$pdf->SetFont('Times','',15);
$pdf->Cell(0,10,'Cartelera: '.'               '.'Cantidad:',0,1,'C');
$pdf->Cell(0,10,'Precio: ',0,1,'C');

$pdf->Output();
?>