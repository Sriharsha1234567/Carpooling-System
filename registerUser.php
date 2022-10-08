<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpoolschema";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if($_REQUEST['name']){
$name = $_REQUEST['name'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];
$city = $_REQUEST['city'];
}

$sql = "INSERT INTO userlogin(`name`,`password`,email,contact,city,isUserActive)VALUES('$name','$password','$email','$contact','$city',true) ";

if($conn->query($sql) == TRUE){
    echo "New User Created Succesfully";
}
else{
    echo "Error in Creating an User" ;
}

mysqli_close($conn);
?>