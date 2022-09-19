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

if($_REQUEST['bookingID']){
    $bookingID = $_REQUEST['bookingID'];
}

$sql = "SELECT * from bookedridedetails brd,ridedetails rd where brd.rideID = rd.rideID";
$result = mysqli_query($conn, $sql);

$json = array();

while($row = mysqli_fetch_assoc($result)){
    if (($bookingID) == $row['bookingID']){
    $json[] = $row;
    }
}

echo json_encode($json);

mysqli_close($conn);
?>