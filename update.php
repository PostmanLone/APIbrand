<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $sql = "SELECT * FROM brands WHERE id='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_name = $row['name'];
        $current_industry = $row['industry'];
    } else {
        echo "No brand found with ID $id";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['brand_name'];
    $new_industry = $_POST['industry'];
    

    $sql = "UPDATE brands SET name='$new_name', industry='$new_industry' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Brand updated successfully!";
        header('Location: index.php');
    } else {
        echo "Error updating brand: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #e7f1ff;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Edit Brand</h1>

<form method="POST" action="">
    <label for="brand_name">Brand Name</label>
    <input type="text" name="brand_name" value="<?php echo $current_name; ?>" required>
    
    <label for="industry">Industry</label>
    <input type="text" name="industry" value="<?php echo $current_industry; ?>" required>
    
    <button type="submit">Update Brand</button>
</form>

<a href="index.php" class="back-link">Back to Brand List</a>

</body>
</html>
