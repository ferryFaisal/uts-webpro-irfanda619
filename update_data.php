<?php


$name = $price = $photo = $description = '';
$nameErr = $priceErr = $photoErr = $descriptionErr = '';
$valid_name = $valid_price = $valid_photo = $valid_description = false;



require 'connect_db.php';
$sql = "SELECT * FROM products WHERE id = '$_GET[id]'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    if (isset($_GET['id'])) {
        $id1 = $_GET['id'];
    }
    // $id1 =     $_GET["id"];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];

 


    // $_POST["id"] =  $id1;


}

// $email1 = $_GET['email'];


?>




<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #FF0000;
        }

        html {

            margin: 50px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container " style="width: 50%;">
        <h2><strong>Products</strong><span class="error">Update</span></strong> <a class="btn btn-outline-danger float-end" href="form.php">Tambah data</a></h2> <br>
        <!-- <p><span class="error">* Required Field</span></p> -->
        <form class="form-group" method="post" enctype="multipart/form-data" action="">

            <input type="hidden" name="id" value="<?php echo $id1 ?>">
            
            Name: <br><input class="form-control" type="text" name="name" value="<?= $name ?>">
            <span class="error"><?php print $nameErr; ?></span>
            <br>

            Description: <br><textarea class="form-control" name="description" rows="5" cols="40"><?= $description ?></textarea>
            <span class="error"><?php echo $descriptionErr; ?></span>
            <br>

            Price: <br><input class="form-control" type="text" name="price" value="<?= $price ?>">
            <span class="error"><?php echo $priceErr; ?></span>
            <br>

            Photo: <input class="form-control" type="file" name="file" accept="image/*" >
            <br><br>
            <!-- <form method="post" enctype="multipart/form-data" class="btn btn-primary"> -->
            <input type="submit" class="btn btn-danger float-start " name="Upload" value="Upload"><a class="btn btn-danger float-end" href="tampil_data.php">Batal</a>
            <!-- </form> -->
            <br><br>
        </form>
    </div>


    <br><br>
    <!-- <input type="submit" name="update" value="Update">
    </form> -->



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['id'])) {
            $id1 = $_GET['id'];
        }


        if (empty($_POST["name"])) {
            $nameErr = "Masukkan nama";
        } else {
            $name = test_input($_POST["name"]);
            $valid_name = true;
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Hanya huruf dan spasi diperbolehkan";
                $valid_name = false;
            }
        }

        if (empty($_POST["description"])) {
            $descriptionErr = "Masukkan deskripsi";
        } else {
            $description = test_input($_POST["description"]);
            $valid_description = true;
        }

        if (empty($_POST["photo"])) {
            $photoErr = "Pilih foto";
        } else {
            $photo = test_input($_POST["photo"]);
            // $valid_description = true;
        }

        if (empty($_POST["price"])) {
            $priceErr = "Masukkan harga";
        } else {
            $price = test_input($_POST["price"]);
            if (!preg_match("/^[ 0-9]*$/", $price)) {
                $priceErr = "Only number allowed";
            } else {
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


    <?php
    if ($valid_name && $valid_price && $valid_description  == true) {

        if (isset($_POST['Upload'])) {

            if (file_exists("images")){
                  echo "";
            } else {
                 $dir = "images";
            $cek = mkdir($dir);
            }
          
            $dir_upload = "images/";
            $nama_file = $_FILES['file']['name'];
            //
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $cek = move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    $dir_upload . $nama_file
                );
                if ($cek) {
               
                } else {
       
                }
            }
        }
        include "update_table.php";
        header('Location: tampil_data.php');
    }
    ?>

</body>

</html>