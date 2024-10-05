<?php

include 'db_connection.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM brands WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Brand deleted successfully!";
        header('Location: index.php');  
    } else {
        echo "Error deleting brand: " . $conn->error;
    }
}
?>
