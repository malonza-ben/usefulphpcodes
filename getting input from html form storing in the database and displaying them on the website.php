//this is a code to accept input from an HTML form, store it in the database, and then display it from the database to the webpage 
//Am using marksprintout database with the student_details table
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Marks Entry</h1>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="studentName">Student Name</label>
                <input type="text" id="studentName" name="studentName" required>
            </div>

            <div class="form-group">
                <label for="registration">Registration Number</label>
                <input type="text" id="registration" name="registration" required>
            </div>

            <div class="form-group">
                <label for="Class">Class</label>
                <select id="Class" name="Class" required>
                    <option value="">Select Class</option>
                    <option value="Class 1">Class 1</option>
                    <option value="Class 2">Class 2</option>
                    <option value="Class 3">Class 3</option>
                    <option value="Class 4">Class 4</option>
                    <option value="Class 5">Class 5</option>
                    <option value="Class 6">Class 6</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marks">Subject Marks</label>
                <input type="number" id="maths" name="maths" placeholder="Maths Marks" required>
                <input type="number" id="english" name="english" placeholder="English Marks" required>
                <input type="number" id="kiswaili" name="kiswaili" placeholder="Kiswaili Marks" required>
                <input type="number" id="science" name="science" placeholder="Science Marks" required>
                <input type="number" id="social" name="social" placeholder="Social studies Marks" required>
            </div>
                 <label for="date">Date</label>

            <div class="form-group">
                <input type="date" id="date" name="date" required>
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>





    <?php
// Replace these values with your own database configuration
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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve student details from the form
    $studentName = $_POST["studentName"];
    $registration = $_POST["registration"];
    $Class = $_POST["Class"];
    $maths = $_POST["maths"];
    $english = $_POST["english"];
    $kiswaili = $_POST["kiswaili"];
    $science = $_POST["science"];
    $social = $_POST["social"];
    $date = $_POST["date"];

    // Format the date properly (assuming the input format is YYYY-MM-DD)
    $date = date("Y-m-d", strtotime($_POST["date"]));

    // Insert data into the database
    $sql = "INSERT INTO student_details (studentName, registration, Class, maths, english, kiswaili, science, social, tarehe)
            VALUES ('$studentName', '$registration', '$Class', $maths, $english, $kiswaili, $science, $social, $date)";

    if ($conn->query($sql) === TRUE) {
        echo "Student details have been successfully inserted into the database.";
        header("Location: inputmarks.php");
    } else {
        echo "Student details have been successfully inserted into the database. ";
          header("Location: inputmarks.php");
    }

    // Close the database connection
    $conn->close();
}
?>


</body>
</html>

</body>
</html>
