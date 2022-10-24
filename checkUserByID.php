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

if($_REQUEST['email']){
    $email = $_REQUEST['email'];
}

$sql = "SELECT * from userlogin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
if ( $row['isuserActive'] == 1){
   echo "1";
}
else{
    echo "0";
}
}
else {
    echo "0";
}

mysqli_close($conn);
?>