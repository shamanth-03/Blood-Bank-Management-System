<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmerName = $_POST['farmerName'];
    $password = $_POST['password'];

    // Check if the fields are not empty
    if (!empty($farmerName) && !empty($password)) {
        // Prepare and bind
        $stmt = $conn->prepare("SELECT password FROM recipients WHERE name = ?");
        $stmt->bind_param("s", $farmerName);
        $stmt->execute();
        $stmt->store_result();
        
        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();
            
            // Verify password
            if (password_verify($password, $hashedPassword)) {
                echo "<script>alert('Login Successful!');</script>";
                echo "<script>window.location.href = 'hospital.html';</script>";
            } else {
                echo "<script>alert('Incorrect password.');</script>";
                echo "<script>window.location.href = 'dsignup.html';</script>";
            }
        } else {
            echo "<script>alert('No account found with that name.');</script>";
            echo "<script>window.location.href = 'dsignup.html';</script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
        echo "<script>window.location.href = 'dsignup.htmlS';</script>";
    }
}
$conn->close();
?>
