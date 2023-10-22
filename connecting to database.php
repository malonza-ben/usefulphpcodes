//hello there. this is a code to connect to the database using localhost the database name is marksprintout
//Firts method by using MySQL PDO
<?php
$dsn = "mysql:host=localhost;dbname= marksprintout";
$username = "root";
$password = "";
//check the connection
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>

//second method using mysqli(improved)
<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marksprintout";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


