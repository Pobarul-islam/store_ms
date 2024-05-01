<?php require('./connection.php');


$sql1 = "SELECT * FROM product";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data1 = mysqli_fetch_assoc(($query1))) {
    $product_id  = $data1['product_id'];
    $product_name = $data1['product_name'];
    $data_list[$product_id] = $product_name;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of store product</title>
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
    $sql = "SELECT * FROM store_product";
    $query = $conn->query($sql);

    echo "<table> <tr> <th>Product Name</th> <th> Quantity</th> <th>Entry Date</th> <th>Action</th> </tr>";
    while ($data = mysqli_fetch_assoc($query)) {
        $store_product_id  =  $data['store_product_id'];
        $store_product_name =  $data['store_product_name'];
        $store_product_quantity =  $data['store_product_quantity'];
        $store_product_entry_date =  $data['store_product_entry_date'];;


        echo "<tr>
     
        <td>$data_list[$store_product_name]</td>
        <td>$store_product_quantity</td> 
        <td>$store_product_entry_date</td> 
        <td><a href='edit_store_product.php?id=$store_product_id'>Edit</a></td>  
        </tr>";
    }

    echo "</table>"

    ?>

    <br>
    <br>
    <button> <a href="./add_product.php">Add Data</a> </button>

</body>

</html>