<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php

    $datecreated = date("Y-d-m H:i:s");
    $datemodification = $datecreated;

    $nameErr = $priceErr = $photoErr = $descriptionErr = '';
    $name = $price = $photo = $description = '';
    $valid_name = $valid_price = $valid_photo = $valid_description = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Masukkan nama";
        } else {
            $name = test_input($_POST["name"]);
            $valid_name = true;
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Hanya huruf dan spasi diperbolehkan";
            }
        }

        // if (empty($_FILES["photo"])) {
        //     // $photoErr = "Pilih gambar";
        // } else {
        //     $photo = test_input($_FILES["photo"]);
        //     $valid_photo = true;
        // }

        if (empty($_POST["description"])) {
            $descriptionErr = "Masukkan deskripsi";
        } else {
            $description = test_input($_POST["description"]);
            $valid_description = true;
        }

        if (empty($_POST["price"])) {
            $priceErr = "Price is required";
        } else {
            $price = test_input($_POST["price"]);
            if (!preg_match("/^[ 0-9]*$/",$price)) {
                $priceErr = "Only number allowed";
              } else{
                $valid_price = true;
             }
}
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>





    <h2>Shopping List</h2>
    <p><span class="error">* Required Field</span></p>
    <form method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Description: <textarea name="description" rows="5" cols="40"><?php echo $description; ?></textarea>
        <span class="error">* <?php echo $descriptionErr; ?></span>
        <br><br>
        Price: <input type="text" name="price" value="<?php echo $price; ?>">
        <span class="error">* <?php echo $priceErr; ?></span>
        <br><br>
        Photo: <input type="file" name="photo" accept="image/*" enctype="multipart/form-data" value="<?php echo $photo; ?>">
        <!-- <span class="error">* <?php echo $photoErr; ?></span> -->
        <br><br>
        <input type="submit" name="submit" value="Upload">

    </form>

    <?php
    if ($valid_name && $valid_price && $valid_description  == true) {
        echo "<br>";
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $price;
        echo "<br>";
        echo $description;
        echo "<br>";
        // include "insert.php";
        // header('Location: login_tabel.php');
    }
    ?>




</body>

</html>