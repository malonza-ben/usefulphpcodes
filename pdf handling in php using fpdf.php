//this code is used to print hello world as either a browser pdf or save to files in the disk

<?php
require('fpdf/fpdf.php');//include the fpdf downloaded from FPDF library from the official website: http://www.fpdf.org/. You can download the latest version from the "Downloads" section.
$pdf = new FPDF();
$pdf->AddPage();//Use the AddPage method to add a page to your PDF document.
$pdf->SetFont('Arial', 'B', 16); //Set Font and Text:
//Also you can Use OOP in creating classes that can add attributes to specific areas you need to style in the PDF. eg. for header and footer
// Define a custom PDF class that extends FPDF for layout customization
class PDF extends FPDF {
    // Header method for displaying a header (optional)
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Student Marks Report', 0, 1, 'C');
    }

    // Footer method for displaying a footer with page number (optional)
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}
//$pdf->Cell(40, 10, 'Hello, World!');//to test by displaying hellow world in the pdf
$pdf->Output(); //Output to Browser as pdf
//$pdf->Output('my_pdf.pdf', 'F'); //Save to File
?>




//Also in the case where i have a database hosted in the local host having the database name as marksprintout and a table student_details
// the table has the following in it:studentName, registration, Class, maths, english, kiswaili, science, social, tarehe
//the code can look like the following. and this is just a sample you can edit more 
<?php

require('fpdf/fpdf.php');//FPDF class in your PHP script using require or include:

$db = new PDO('mysql:host=localhost;dbname=marksprintout', 'root', '');//connecting to the database in the local host 



//Create an FPDF Object and Add a Page:
$pdf = new FPDF();//Create an FPDF Object:
$pdf->AddPage();//Use the AddPage method to add a page to your PDF document.


// Set Background Color for the pdf
$pdf->SetFillColor(200, 200, 200); // Gray background color
//$pdf->Rect(0, 0, $pdf->w, $pdf->h, 'F'); // Fill the entire page with the background color
//SetFillColor is used to set the background color.
//SetTextColor is used to set the text color.
//SetDrawColor is used to set the border color.
//SetFont is used to set different fonts and styles for text. 



//Set the font, font size, and headers for your PDF.
$pdf->SetFont('Arial', 'B', 11); //Set Font and Text teh B is for making the text bold 
//headers
$pdf->Cell(30, 10, 'Student Name', 1);//the 1 is for adding bolders to the table
$pdf->Cell(25, 10, 'Registration', 1);//the 21, 10 are used to set the cell dimansion on the table displaying
$pdf->Cell(20, 10, 'Class', 1);
$pdf->Cell(20, 10, 'Maths', 1);
$pdf->Cell(20, 10, 'English', 1);
$pdf->Cell(20, 10, 'Kiswahili', 1);
$pdf->Cell(20, 10, 'Science', 1);
$pdf->Cell(20, 10, 'Social', 1);
$pdf->Cell(20, 10, 'Date', 1);
$pdf->Ln();// used to enter the next line 

//also you can use the below to display the header 
// Output the header row
//$header = array('Student Name', 'Registration', 'Class', 'Maths', 'English', 'Kiswahili', 'Science', 'Social', 'Date');
//$cellWidth = 40;
//$cellHeight = 10;
//foreach ($header as $col) {
    //$pdf->Cell($cellWidth, $cellHeight, $col, 1, 0, 'C');
//}
//$pdf->Ln(); // Move to the next line

// Reset the font to normal for data rows
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // set font color for the data rows to black

//Fetch student data from the database and use FPDF's Cell method to output it to the PDF.
$stmt = $db->query('SELECT * FROM student_details');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(30, 10, $row['studentName'], 1);
    $pdf->Cell(25, 10, $row['registration'], 1);
    $pdf->Cell(20, 10, $row['Class'], 1);
    $pdf->Cell(20, 10, $row['maths'], 1);
    $pdf->Cell(20, 10, $row['english'], 1);
    $pdf->Cell(20, 10, $row['kiswaili'], 1);
    $pdf->Cell(20, 10, $row['science'], 1);
    $pdf->Cell(20, 10, $row['social'], 1);
    $pdf->Cell(20, 10, $row['tarehe'], 1);
    $pdf->Ln();
}

//$pdf->Output('student_details.pdf', 'D'); // Output and force download


$pdf->Output(); //Output to Browser as pdf
//$pdf->Output('my_pdf.pdf', 'F'); //Save to File


?>

