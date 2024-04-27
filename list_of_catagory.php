<?php require('./connection.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

    <?php
    $sql = "SELECT * FROM catagory";
    $query = $conn->query($sql);


    echo "<table> <tr> <th>Catagory</th> <th> Date</th> </tr>";
    while ($data = mysqli_fetch_assoc($query)) {
        $catagory =  $data['catagory_name'];
        $catagory_entry_date =  $data['catagory_entry_date'];


        echo "<tr><td>$catagory</td> <td>$catagory_entry_date</td> </tr>";
    }

    echo "</table>"

    ?>

    <br>
    <br>
    <button> <a href="./add_catagory.php">Add Data</a> </button>

</body>

</html>