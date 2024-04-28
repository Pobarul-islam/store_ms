<?php require('./connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <?php

    if (isset($_GET['product_name'])) {

        $product_name =  $_GET['product_name'];
        $product_catagory =  $_GET['product_catagory'];
        $product_entry_date = $_GET['product_entry_date'];
        $product_code = $_GET['product_code'];

        $sql = "INSERT INTO  product (product_name , product_catagory, product_entry_date, product_code) VALUES('$product_name', '$product_catagory' , '$product_entry_date', '$product_code')";

        if ($conn->query($sql) == TRUE) {
            echo 'data insert';
        } else {
            echo "data not inserted";
        }
    }



    ?>

    <?php
    $sql = "SELECT * FROM catagory";

    $query = $conn->query($sql);

    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?> " method="GET">
        Product: <br>
        <input type="text" name="product_name"> <br> <br>
        Product Catagory: <br> <br>
        <select name="product_catagory">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $catagory_id = $data['catagory_id'];
                $catagory_name = $data['catagory_name'];

                echo " <option value='$catagory_id'>$catagory_name</option>";
            }
            ?>
        </select>
        <br> <br>
        Product Code: <br>
        <input type="text" name="product_code"> <br> <br>
        Product Entry Date: <br>
        <input type="date" name="product_entry_date"> <br> <br>

        <input type="submit" value="submit">
    </form>
    <br>
    <br>

    <button> <a href="./list_of_catagory.php">Catagory List</a> </button>
    <button> <a href="./list_of_product.php">Product List</a> </button>

</body>

</html>