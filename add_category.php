<?php
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'store_db';

$conn = new mysqli($host_name, $user_name, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($category_name, $category_entry_date)) {

        $category_name =  $_GET['category_name'];
        $category_entry_date = $_GET['category_entry_date'];
    }

    ?>
    <form action="add_category.php" method="GET">
        <label for="">Category Name</label>
        <input type="text" name="category_name"> <br> <br>
        <label for="">Category Entry Date</label>
        <input type="date" name="category_entry_date"> <br> <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>