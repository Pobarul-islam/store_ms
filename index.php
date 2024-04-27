if (isset($_GET['$category_name'])) {

$category_name = $_GET['category_name'];
$category_entry_date = $_GET['category_entry_date'];

$sql = "INSERT INTO category (category_name, category_entry_date) VALUES ( '$category_name', '$category_entry_date')";

if ($conn->query($sql) == TRUE) {
echo 'Category data inserted successfully';
} else {
echo 'Category data not inserted';
}
}



<?php
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'store_db';

$conn = new mysqli($host_name, $user_name, $password, $db_name);
// Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}

?>