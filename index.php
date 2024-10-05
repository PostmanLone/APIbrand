<?php
include 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST['brand_name'];
    $industry = $_POST['industry'];

    $sql = "INSERT INTO brands (name, industry) VALUES ('$brand_name', '$industry')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New brand added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 45%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #e7f1ff;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        .action-buttons a {
            margin-right: 5px;
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .action-buttons a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h1>Brand Management</h1>

<form method="POST" action="">
    <div class="form-group">
        <input type="text" name="brand_name" placeholder="Brand Name" required>
        <input type="text" name="industry" placeholder="Industry" required>
    </div>
    <button type="submit">Submit</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Industry</th>
        <th>Actions</th>
    </tr>
    
    <?php
    $sql = "SELECT * FROM brands";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['industry']}</td>
                    <td class='action-buttons'>
                        <a href='update.php?id={$row['id']}'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='delete' onclick=\"return confirm('Are you sure you want to delete this brand?');\">Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No brands found</td></tr>";
    }
    ?>
</table>

</body>
</html>
