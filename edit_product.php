<?php require('./connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];

        $sql = "SELECT * FROM product WHERE product_id = '$getid'";

        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $product_id = $data['product_id'];
        $product_name = $data['product_name'];
        $product_catagory = $data['product_catagory'];
        $product_code = $data['product_code'];
        $product_entry_date = $data['product_entry_date'];
    }
    if(isset($_GET['product_name'])){
        $new_product_name = $_GET['product_name'];
        $new_product_catagory = $_GET['product_catagory'];
        $new_product_code = $_GET['product_code'];
        $new_product_entry_date = $_GET['product_entry_date'];
        $new_product_id = $_GET['product_id'];

        $sql1 = "UPDATE product SET product_name='$new_product_name', product_catagory='$new_product_catagory', 
        product_code ='$new_product_code', 
        product_entry_date='$new_product_entry_date'
       WHERE product_id=$new_product_id";
        // $query1 = $conn->query($sql);
        if ($conn->query($sql1) == TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ";
        }

    }


    ?>

    <?php
    $sql = "SELECT * FROM catagory";

    $query = $conn->query($sql);

    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?> " method="GET">
        Product: <br>
        <input type="text" name="product_name" value="<?php echo $product_name ?>"> <br> <br>
        Product Catagory: <br> <br>
        <select name="product_catagory">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $catagory_id = $data['catagory_id'];
                $catagory_name = $data['catagory_name'];

            ?>
                <option value='<?php echo $catagory_id ?>' <?php if ($catagory_id == $product_catagory) {echo 'selected';} ?>> <?php echo $catagory_name ?>
                </option>;
            <?php
            }
            ?>
        </select>
        <br> <br>
        Product Code: <br>
        <input type="text" name="product_code" value="<?php echo $product_code ?>"> <br> <br>
        Product Entry Date: <br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"> <br> <br>
    

        <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden> <br> <br>

        <input type="submit" value="submit">
    </form>
    <br>
    <br>

    <button> <a href="./list_of_catagory.php">Catagory List</a> </button>
    <button> <a href="./list_of_product.php">Product List</a> </button>

</body>

</html>