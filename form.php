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

    // $datecreated = date("Y-d-m H:i:s");
    // $datemodification = $datecreated;

    // $nameErr = $emailErr = $passwordErr = $roleErr =  $password_confirmErr = "";
    // $name = $email = $password = $role = $password_confirm = "";
    // $valid_name = $valid_email = $valid_password = $valid_password_confirm = $valid_role = false;

    ?>



    <h2>Shopping List</h2>
    <p><span class="error">* Required Field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value=" ">
        <!-- <span class="error">* <?php echo $nameErr; ?></span> -->
        <br><br>
        Description: <input type="textarea"  name="name" value=" ">
        <!-- <span class="error">* <?php echo $nameErr; ?></span> -->
        <br><br>
        Price: <input type="textarea" name="name" value=" ">
        <!-- <span class="error">* <?php echo $nameErr; ?></span> -->
        <br><br>
        Photo:  <input type="file" name="image" accept="image/*" />
        <!-- <span class="error">* <?php echo $nameErr; ?></span> -->
        <br><br>

        <input type="submit" name="submit" value="Upload">

    </form>






</body>

</html>