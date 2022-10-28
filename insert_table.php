<?php

    require "connect_db.php";

 $create = date("Y-d-m H:i:s");
    $photo = $nama_file;

    $sql = "INSERT INTO `products`(`name`, `description`,`price`,`photo`,`created`) VALUES ('$name','$description','$price','$photo','$created')";

    if ($conn->query($sql) === TRUE) {
        // echo "File has been insert into the Database";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
