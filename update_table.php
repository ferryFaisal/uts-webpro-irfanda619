<?php

    // require "connect_db.php";

    // $created = date ('Y-m-d H:i:s');
    // $photo = $nama_file;

    // $sql = "INSERT INTO `products`(`name`, `description`,`price`,`photo`,`created`) VALUES ('$name','$description','$price','$photo','$created')";

    // if ($conn->query($sql) === TRUE) {
    //     // echo "File has been insert into the Database";
    // } else {
    //     echo "Error creating table: " . $conn->error;
    // }

    // $conn->close();
    
    require "connect_db.php";

    $modified = date('Y-m-d H:i:s');
    $photo = $nama_file;

    $sql1 = "UPDATE products SET 
                        name = '$name',
                        price = '$price',
                        photo = '$photo',
                        description = '$description',
                        modified = '$modified'
                  
                        where id = '$_POST[id]'";
    $result = $conn->query($sql1);

    if ($conn->query($sql1) === TRUE) {
        // echo "New record created successfully";
        // header('Location: tampil_data.php');
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
    $conn->close();
