<?php

$host_name = "localhost";
$db_name = "store_db";
$user_name = "root";
$password = '';

$conn = new mysqli($host_name,  $user_name, $password, $db_name,);

if ($conn->connect_error) {
    echo 'Connection failed: ' . $conn->connect_error;
}