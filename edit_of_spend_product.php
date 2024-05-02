<?php require('./connection.php');

require('myfunction.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit spend Product</title>
</head>

<body>
    <?php

    $spend_product_name = ""; // Initialize with a default value
    $spend_product_id = ""; // Initialize with a default value

    if (isset($_GET['id'])) {
        $getid = $_GET['id'];

        $sql = "SELECT * FROM spend_product WHERE spend_product_id=$getid"; // Corrected table name

        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $spend_product_id  = $data['spend_product_id'];
        $spend_product_name = $data['spend_product_name'];
        $spend_product_quantity = $data['spend_product_quantity'];
        $spend_product_entry_date = $data['spend_product_entry_date'];
    }


    if (isset($_GET['spend_product_name'])) {
        $new_spend_product_name = $_GET['spend_product_name'];
        $new_spend_product_quantity = $_GET['spend_product_quantity'];
        $new_spend_product_entry_date = $_GET['spend_product_entry_date'];
        $new_spend_product_id = $_GET['spend_product_id'];

        $sql1 = "UPDATE spend_product SET spend_product_name='$new_spend_product_name', spend_product_quantity='$new_spend_product_quantity', 
        spend_product_entry_date='$new_spend_product_entry_date' 
       WHERE spend_product_id = $new_spend_product_id";


        if ($conn->query($sql1) == TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ";
        }
    }
    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
        Product: <br> <br>
        <select name='spend_product_name'>
            <?php

            $sql = "SELECT * FROM product";
            $query = $conn->query($sql);

            while ($data = mysqli_fetch_array($query)) {
                $data_id = $data['product_id'];
                $data_name = $data['product_name'];
            ?>

                <option value='<?php echo $data_id ?>' <?php if ($spend_product_name == $data_id) {
                                                            echo 'selected';
                                                        } ?>><?php echo $data_name ?>
                </option>
            <?php
            }

            ?>
        </select>
        <br> <br>
        Product Quantity: <br>
        <input type="number" name="spend_product_quantity" value='<?php echo $spend_product_quantity ?>'> <br> <br>
        Store Entry Date: <br>
        <input type="date" name="spend_product_entry_date" value='<?php echo $spend_product_entry_date ?>'> <br> <br>

        <input hidden type="text" name="spend_product_id" value='<?php echo $spend_product_id ?>'> <br> <br>
        <input type="submit" value="submit">
    </form>
    <br>
    <br>

    <button> <a href="./list_of_category.php">Category List</a> </button>
    <button> <a href="./list_of_product.php">Product List</a> </button>

</body>

</html>