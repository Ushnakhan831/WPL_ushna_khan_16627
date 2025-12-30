<?php
include "db.php";

$platform = $_POST["platform"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$gender = $_POST["gender"];

$sql = "INSERT INTO users(platform,firstname,lastname,email,password,gender)
VALUES('$platform','$fname','$lname','$email','$password','$gender')";

if($conn->query($sql)){
    echo "Signup Successful";
}else{
    echo "Error";
}
?>
