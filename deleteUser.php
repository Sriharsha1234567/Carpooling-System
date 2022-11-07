<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ued_database";

// Create connection
$connn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_REQUEST['userID']){
$userID = $_REQUEST['userID'];
}

$sql1 = "DELETE FROM userlogin WHERE email = 12";

if(mysqli_query($connn, $sql1)){
  echo "successful";
} 
else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($connn);
?>