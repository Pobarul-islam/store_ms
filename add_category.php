<?php

$host_name = "localhost";
$db_name = "store_db";
$user_name = "root";
$password = '';

$conn = new mysqli($host_name,  $user_name, $password, $db_name,);

if ($conn->connect_error) {
    echo 'Connection failed: ' . $conn->connect_error;
}

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

    if (isset($_GET['catagory_name'])) {

        $catagory_name =  $_GET['catagory_name'];
        $catagory_entry_date
            = $_GET['catagory_entry_date'];

        $sql = "INSERT INTO  catagory (catagory_name, catagory_entry_date) VALUES('$catagory_name', '$catagory_entry_date')";

        if ($conn->query($sql) == TRUE) {
            echo 'data insert';
        } else {
            echo "data not inserted";
        }
    }



    ?>

    <form action="add_category.php" method="get">
        Category: <br>
        <input type="text" name="catagory_name"> <br> <br>
        Category Entry Date: <br>
        <input type="date" name="catagory_entry_date
"> <br> <br>
        <input type="submit" value="submit">
    </form>


</body>

</html>