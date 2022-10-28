<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webpro";

// echo "<br>MySQLi Procedural<br>";
// Create connection
// $conn = mysqli_connect($servername, $username, $password);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
// mysqli_close($conn);

// echo  "<br><br>PDO<br>";
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
//   } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//   }

// echo "<br>MySQLi Object Oriented<br>";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br><br>";h


?>