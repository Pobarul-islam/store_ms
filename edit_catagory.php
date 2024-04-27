<?php require('./connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catagory</title>
</head>

<body>
    <?php

    if (isset($_GET['id'])) {
        $getid = $_GET['id'];

        $sql = "SELECT * FROM catagory WHERE catagory_id = '$getid'";

        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $catagory_id = $data['catagory_id'];
        $catagory_name = $data['catagory_name'];
        $catagory_entry_date = $data['catagory_entry_date'];
    }

    if (isset($_GET['catagory_name'])) {
        $new_catagory_name = $_GET['catagory_name'];
        $new_catagory_entry_date = $_GET['catagory_entry_date'];
        $new_catagory_id = $_GET['catagory_id'];

        $sql1 = "UPDATE catagory SET 
       catagory_name = '$new_catagory_name', 
       catagory_entry_date= '$new_catagory_entry_date' WHERE catagory_id='$new_catagory_id'";
       
      


        if ($conn->query($sql1) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " ;
        }

    }



    ?>

    <form action="edit_catagory.php" method="GET">
        Category: <br>
        <input type="text" name="catagory_name" value="<?php echo $catagory_name ?>"> <br> <br>
        Category Entry Date: <br>
        <input type="date" name="catagory_entry_date" value="<?php echo $catagory_entry_date ?>"> <br> <br>
        <input type="text" name="catagory_id" value="<?php echo $catagory_id ?>" hidden> <br> <br>
        <input type="submit" value="Update">
    </form>
    <br>
    <br>

    <button> <a href="./list_of_catagory.php">View List</a> </button>
</body>

</html>