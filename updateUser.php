<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpoolschema";

// Create connection
$connn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_REQUEST['email']){
$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$contact = $_REQUEST['contact'];
$city = $_REQUEST['city'];

$isAdmin = $_REQUEST['isAdmin'];
$isuserActive = $_REQUEST['isuserActive'];
$isuserDriver = $_REQUEST['isuserDriver'];
}

$sql1 = "UPDATE userlogin SET `name`='$name',contact='$contact',city='$city',isuserActive=$isuserActive,isAdmin=$isAdmin,isuserDriver=$isuserDriver WHERE email = '$email';";
if($connn->query($sql1) == TRUE){
  echo "successful";
} 
else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($connn);
?>