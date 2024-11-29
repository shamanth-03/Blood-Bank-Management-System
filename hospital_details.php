<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
        }
        .hospital-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            background-color: #0066cc;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            margin-top: 0;
        }
        p {
            font-size: 18px;
        }
        .back-link {
            margin-top: 20px;
        }
        .back-link a {
            text-decoration: none;
            color: #0066cc;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
        .receive-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hospital Details</h1>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['receive'])) {
            $id = $_POST['id'];

            header("Location: rsignup.html?id=$id");
            // Prepare SQL statement to delete the specific record
            $sql = "DELETE FROM hospitals WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);    

            if ($stmt->execute()) {
                echo "<p>Record with ID: " . htmlspecialchars($id) . " received successfully.</p>";
            } else {
                echo "<p>Error deleting record: " . $conn->error . "</p>";
            }

            $stmt->close();
        }

        // Get hospital name from URL parameter
        if (isset($_GET['hospital'])) {
            $hospital = $_GET['hospital'];

            // Fetch hospital details with the same name and sorted by location
            $sql = "SELECT * FROM hospitals WHERE hospital = ? ORDER BY location";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $hospital);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                echo "<div class='hospital-info'>";
                echo "<h2>Hospitals with Name: " . htmlspecialchars($hospital) . "</h2>";

                // Output data of each hospital with the same name and location
                while ($row = $result->fetch_assoc()) {
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p><strong>Blood Group:</strong> " . htmlspecialchars($row['bloodgroup']) . "</p>";
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
                    echo "<input type='hidden' name='hospital' value='" . htmlspecialchars($hospital) . "'>";
                    echo "<input type='hidden' name='bloodgroup' value='" . htmlspecialchars($row['bloodgroup']) . "'>";
                    echo "<button type='submit' class='receive-button' name='receive'>Receive</button>";
                    echo "</form>";
                    echo "<hr>";
                }

                echo "</div>";
            } else {
                echo "<p>No details found for hospitals with this name.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No hospital specified.</p>";
        }

        // Close connection
        $conn->close();
        ?>
        <div class="back-link">
            <a href="display_hospital.php">Back to Hospital List</a>
        </div>
    </div>
</body>
</html>