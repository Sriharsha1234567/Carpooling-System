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

if($_REQUEST['bookingID']){
$bookingID = $_REQUEST['bookingID'];
$bookingStatus = $_REQUEST['bookingStatus'];
}

$sql1 = "UPDATE bookedRideDetails SET bookingStatus='$bookingStatus' WHERE bookingID='$bookingID'";
if(mysqli_query($connn, $sql1)){
    echo "Booking status were updated successfully to Cancelled.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($connn);
?>