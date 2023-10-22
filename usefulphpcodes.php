<?php

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();//Use the AddPage method to add a page to your PDF document.
$pdf->SetFont('Arial', 'B', 16); //Set Font and Text:
$pdf->Cell(40, 10, 'Hello, World!');
$pdf->Output(); //Output to Browser as pdf
//$pdf->Output('my_pdf.pdf', 'F'); //Save to File


?>