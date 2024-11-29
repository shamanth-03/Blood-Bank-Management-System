<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospital = $_POST['hospital'];
    $location = $_POST['location'];
    $bloodgroup = $_POST['bloodgroup'];

    if (!empty($hospital) && !empty($location) && !empty($bloodgroup)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO hospitals (hospital, location, bloodgroup) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $hospital, $location, $bloodgroup);

        if ($stmt->execute()) {
            echo "<script>alert('Submission Successful!');</script>";
            echo "<script>window.location.href = 'first.html';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
        echo "<script>window.location.href = 'hospital.html';</script>";
    }
}

