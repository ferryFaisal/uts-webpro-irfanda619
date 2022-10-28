<?php
require "connect_db.php";

$sql = "SELECT * FROM products";

$result = $conn->query($sql); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#F000 ;">


    <div class="container">
        <!-- <caption>
            <h2> Users Account </h2>
        </caption>
        <h4><a href="form.php">Add User</a></h4> -->
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> <?php
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["description"] ?></td>
                            <td><?= $row["price"] ?></td>
                            <td><?php echo "<img src='images/$row[photo]' width='auto' height='90' />"; ?></td>
                            <td><?= $row["created"] ?></td>
                            <td><?= $row["modified"] ?></td>

                            <?php echo
                            "<td>
                           <a href='update_data.php?id=$row[id]'>Edit</a> | <a href='delete_data.php?id=$row[id]' onClick=\"return confirm('Anda yakin ingin menghapus data ini?');\">Delete</a>
                    
                 </td>";
                            ?>

                        </tr> <?php
                            }
                                ?>
            </tbody>
        </table>
    </div>
<?php
                    }
                    $conn->close();
?>
</body>

</html>