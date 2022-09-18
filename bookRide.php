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


$sql = "SELECT * from ridedetails";
$result = mysqli_query($conn, $sql);

$json = array();

while($row = mysqli_fetch_assoc($result)){
    $json[] = $row;
}

echo json_encode($json);

mysqli_close($conn);
?>