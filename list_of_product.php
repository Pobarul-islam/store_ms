<?php require('./connection.php');


$sql1 = "SELECT * FROM catagory";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc(($query1))) {
    $catagory_id = $data1['catagory_id'];
    $catagory_name = $data1['catagory_name'];

    $data_list[$catagory_id] = $catagory_name;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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

    a {
        text-decoration: none;
    }
</style>

<body>

    <?php
    $sql = "SELECT * FROM product";
    $query = $conn->query($sql);


    echo "<table> <tr> <th>Product Name</th> <th> Catagory</th> <th> Product Code</th> <th>Action</th> </tr>";
    while ($data = mysqli_fetch_assoc($query)) {
        $product_id  =  $data['product_id'];
        $product_catagory =  $data['product_catagory'];
        $product_name =  $data['product_name'];
        $product_code =  $data['product_code'];
        $product_entry_date =  $data['product_entry_date'];


        echo "<tr>
        <td>$product_name</td> 
        <td>$data_list[$product_catagory]</td>
        <td>$product_code</td> 
        <td><a href='edit_product.php?id=$product_id'>Edit</a></td>  
        </tr>";
    }

    echo "</table>"

    ?>

    <br>
    <br>
    <button> <a href="./add_product.php">Add Data</a> </button>

</body>

</html>