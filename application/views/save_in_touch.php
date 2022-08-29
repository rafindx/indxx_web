<?php
//print_r($data);
//include('../config/database.php');


$servername = "localhost";
$username = "indxx_demo";
$password = "NA2;G+^}hcge";
$dbname = "indexl_work";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$company = mysqli_real_escape_string($conn, $_POST['company']);


$sql = "INSERT INTO tbl_get_in_touch (name,email,company)
VALUES ('$name', 'email', '$company')";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>