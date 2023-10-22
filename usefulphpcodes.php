//this code is used to print hello world as either a browser pdf or save to files in the disk

<?php
require('fpdf/fpdf.php');//include the fpdf downloaded from FPDF library from the official website: http://www.fpdf.org/. You can download the latest version from the "Downloads" section.
$pdf = new FPDF();
$pdf->AddPage();//Use the AddPage method to add a page to your PDF document.
$pdf->SetFont('Arial', 'B', 16); //Set Font and Text:
$pdf->Cell(40, 10, 'Hello, World!');
$pdf->Output(); //Output to Browser as pdf
//$pdf->Output('my_pdf.pdf', 'F'); //Save to File


?>
