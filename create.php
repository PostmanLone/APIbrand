<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST['brand_name'];
    
    $sql = "INSERT INTO brands (name) VALUES ('$brand_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New brand added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    <label>Brand Name:</label>
    <input type="text" name="brand_name" required>
    <button type="submit">Add Brand</button>
</form>
