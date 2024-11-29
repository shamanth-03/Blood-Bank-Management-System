<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farm_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, photo FROM crops";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td><img src='" . $row["photo"] . "' width='100'></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No crops found";
}

$conn->close();
?>
