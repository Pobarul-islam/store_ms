<?php require('./connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST['catagory_name'])) {

        $catagory_name =  $_POST['catagory_name'];
        $catagory_entry_date = $_POST['catagory_entry_date'];

        $sql = "INSERT INTO  catagory (catagory_name, catagory_entry_date) VALUES('$catagory_name', '$catagory_entry_date')";

        if ($conn->query($sql) == TRUE) {
            echo 'data insert';
        } else {
            echo "data not inserted";
        }
    }



    ?>

    <form action="add_category.php" method="POST">
        Category: <br>
        <input type="text" name="catagory_name"> <br> <br>
        Category Entry Date: <br>
        <input type="date" name="catagory_entry_date"> <br> <br>
        <input type="submit" value="submit">
    </form>


</body>

</html>