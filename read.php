<?php
include 'db_connection.php';

$sql = "SELECT * FROM brands";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Brand Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No brands found!";
}
?>
