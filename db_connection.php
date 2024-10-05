<?php
$host = 'sql113.infinityfree.com';
$db_name = 'if0_37409534_brands';
$username = 'if0_37409534';
$password = 'gwapoko050800';


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
