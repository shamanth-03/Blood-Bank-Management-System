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
    $name = $_POST['name'];
    $city = $_POST['city'];
    $bloodgroup = $_POST['bloodgroup'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    if (strlen($phonenumber) == 10 && ctype_digit($phonenumber)) {
        if (!empty($name) && !empty($city) && !empty($bloodgroup) && !empty($phonenumber) && !empty($password) && preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password)) {
            
            // Check for existing account
            $stmt = $conn->prepare("SELECT * FROM recipients WHERE name = ? AND phonenumber = ?");
            $stmt->bind_param("ss", $name, $phonenumber);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Account already exists
                echo "<script>alert('Account exists with the same name or phone number.');</script>";
                echo "<script>window.location.href = 'donar.html';</script>";
            } else {
                // Proceed with the registration
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $stmt = $conn->prepare("INSERT INTO recipients (name, city, bloodgroup, phonenumber, password) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $name, $city, $bloodgroup, $phonenumber, $hashedPassword);

                if ($stmt->execute()) {
                    echo "<script>alert('Register Successful!');</script>";
                    echo "<script>window.location.href = 'first.html';</script>";
                } else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }
            }

            $stmt->close();
        } else {
            echo "<script>alert('Password is not alphanumeric (e.g., 12[a-z][A-Z])');</script>";
            echo "<script>window.location.href = 'donar.html';</script>";
        }
    } else {
        echo "<script>alert('Phone field is incorrect. It should be exactly 10 digits.');</script>";
        echo "<script>window.location.href = 'donar.html';</script>";
    }
}
$conn->close();
?>
