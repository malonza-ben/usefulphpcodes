//in this code am going to demonstrate the OOP concept in PHP
//Create a database called marksprintout and has a table called student_details
//the table has student data: studentName, maths, english, kiswaili, science, social
//the output is a PDF with student's name, marks for every subject, total marks, and the average marks that is posted to the browser 

<?php
// Include the FPDF library for creating PDFs
require('fpdf/fpdf.php');

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

// Define your database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "marksprintout";

// Create a mysqli object to handle the database connection
$db = new mysqli($host, $username, $password, $dbname);

// Define a Student class for handling student data and calculations
class Student {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Retrieve all student data from the database
    public function getAllStudents() {
        $query = "SELECT * FROM student_details";
        $result = $this->db->query($query);

        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }

        return $students;
    }

    // Calculate the total marks for a student
    public function calculateTotalMarks($studentMarks) {
        $total = array_sum($studentMarks);
        return $total;
    }

    // Calculate the average marks for a student
    public function calculateAverageMarks($studentMarks) {
        $totalMarks = $this->calculateTotalMarks($studentMarks);
        $numSubjects = count($studentMarks) - 2; // Subtract 2 for 'id' and 'name' columns
        $average = $totalMarks / $numSubjects;
        return $average;
    }
}

// Clear any previous output buffering to ensure a clean output
ob_clean();

// Create a Student object for data processing
$student = new Student($db);

// Retrieve all student data from the database
$allStudents = $student->getAllStudents();

if (!empty($allStudents)) {
    // Create a PDF document using the custom PDF class
    $pdf = new PDF();
    $pdf->AddPage();

    // Loop through each student's data and add it to the PDF
    foreach ($allStudents as $studentData) {
        $studentName = $studentData['studentName'];
        $studentMarks = [
            'maths' => $studentData['maths'],
            'english' => $studentData['english'],
            'kiswaili' => $studentData['kiswaili'],
            'science' => $studentData['science'],
            'social' => $studentData['social']
        ];

        $totalMarks = $student->calculateTotalMarks($studentMarks);
        $averageMarks = $totalMarks / 5; // Assuming there are 5 subjects

        // Add student data to the PDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, "$studentName's Marks", 0, 1, 'C');
        $pdf->Cell(0, 10, "Maths: {$studentMarks['maths']}", 0, 1);
        $pdf->Cell(0, 10, "English: {$studentMarks['english']}", 0, 1);
        $pdf->Cell(0, 10, "Kiswaili: {$studentMarks['kiswaili']}", 0, 1);
        $pdf->Cell(0, 10, "Science: {$studentMarks['science']}", 0, 1);
        $pdf->Cell(0, 10, "Social: {$studentMarks['social']}", 0, 1);
        $pdf->Cell(0, 10, "Total Marks: $totalMarks", 0, 1);
        $pdf->Cell(0, 10, "Average Marks: $averageMarks", 0, 1);
        $pdf->Ln(10);
    }

    // Output the PDF to the browser
    $pdf->Output();
} else {
    echo "No student records found in the database.";
}
?>
