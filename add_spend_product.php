<?php require('./connection.php');

require('myfunction.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add spend Product</title>
</head>

<body>
    <?php

    if (isset($_GET['spend_product_name'])) {

        $spend_product_name =  $_GET['spend_product_name'];
        $spend_product_quantity = $_GET['spend_product_quantity'];
        $spend_product_entry_date = $_GET['spend_product_entry_date'];

        $sql = "INSERT INTO spend_product (spend_product_name, spend_product_quantity, spend_product_entry_date) VALUES('$spend_product_name', '$spend_product_quantity', '$spend_product_entry_date')";

        if ($conn->query($sql) == TRUE) {
            echo 'data inserted';
        } else {
            echo "data not inserted";
        }
    }
    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
        Spent Product: <br> <br>
        <select name="spend_product_name">
            <?php
            data_list('product', 'product_id', 'product_name');

            ?>
        </select>
        <br> <br>
        Spend Product Quantity: <br>
        <input type="text" name="spend_product_quantity"> <br> <br>
        Spend Entry Date: <br>
        <input type="date" name="spend_product_entry_date"> <br> <br>
        <input type="submit" value="submit">
    </form>
    <br>
    <br>

    <button> <a href="./list_of_catagory.php">Catagory List</a> </button>
    <button> <a href="./list_of_product.php">Product List</a> </button>

</body>

</html>