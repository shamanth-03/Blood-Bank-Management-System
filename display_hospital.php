<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Available Hospitals</title>
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
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            text-decoration: underline;
        }
        .upload {
            font-size: 20px;
            color: #0066cc;
            margin-bottom: 10px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="background-color: aquamarine; padding-bottom: 45px;">Our Available Hospitals</h1>
       
        <table>
            <tr>
                <th>Hospital Name</th>
            </tr>
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

            // Fetch hospitals
            $sql = "SELECT DISTINCT hospital FROM hospitals";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><a href='hospital_details.php?hospital=" . urlencode($row['hospital']) . "'>" . htmlspecialchars($row['hospital']) . "</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>No hospitals available.</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
