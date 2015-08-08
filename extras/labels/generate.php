<?php
include("fpdf.php");
include("phpqrcode.php");
include("barcode.php");

function Avery5160($x, $y, &$pdf, $id) {
    $left = 3; // 0.19" in mm
    $top = 7; // 0.5" in mm
    $width = 63.9; // 2.63" in mm
    $height = 28; // 1.0" in mm
    $hgap = 3; // 0.12" in mm
    $vgap = 0.0;

    QRcode::png($id, "pics/QR".$id.".png", QR_ECLEVEL_L, 3);
    $bc = new barCode39($id);
    $bc->draw("pics/"."BAR".$id.".png");

    $x = $left + (($width + $hgap) * $x);
    $y = $top + (($height + $vgap) * $y);
    $pdf->SetXY($x, $y);
    $pdf->Image("pics/"."QR".$id.".png", $x + 5, $y + 1);
    $pdf->Image("pics/"."BAR".$id.".png", $x+33.5, $y+16);
    $pdf->Text($x +35, $y + 15,  $id);
}

$pdf = new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 30);
$pdf->SetMargins(0, 0);
$pdf->SetAutoPageBreak(false);
$x = $y = 0;


for ( $i = 1; $i < 601; $i++ ) {
    Avery5160($x, $y, $pdf, sprintf("%05d",$i));

    $y++; // next row
    if($y == 10) { // end of page wrap to next column
        $x++;
        $y = 0;
        if($x == 3) { // end of page
            $x = 0;
            $y = 0;
            $pdf->AddPage();
        }
    }
}
header("Content-type: application/octet-stream");
$pdf->Output('Labels.pdf', 'I');
