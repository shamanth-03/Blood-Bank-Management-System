<?php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";      // Replace with your MySQL password
$dbname = "recipe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Prepare SQL statement to check if user exists
    $sql = "SELECT * FROM registrations WHERE name = ? AND phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, redirect to another page
        echo "<script>alert('Login Successful!');</script>";
        header("Location: first.html");
        exit();
    } else {
        // User doesn't exist, handle accordingly (e.g., show error message)
        echo "User does not exist.";
    }

    $stmt->close();
}

// Close database connection
$conn->close();
?>
