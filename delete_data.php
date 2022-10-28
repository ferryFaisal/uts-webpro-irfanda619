<?php

require "connect_db.php";

$sql = "DELETE FROM products WHERE id='$_GET[id]'";

if ($conn->query($sql) === TRUE) {
    // echo "File has been insert into the Database";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

header('Location: tampil_data.php');

?>