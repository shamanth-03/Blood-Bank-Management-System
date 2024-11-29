<?php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "recipe_db";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO registrations (name, phone, location) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $location);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!');</script>";
        echo "<script>window.location.href = 'first.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
