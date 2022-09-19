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

if($_REQUEST['remainingSeats']){
$rideID = $_REQUEST['rideID'];
$remainingSeats = $_REQUEST['remainingSeats'];
}

$sql1 = "UPDATE ridedetails SET availableSeats='$remainingSeats' WHERE rideID='$rideID'";
if(mysqli_query($connn, $sql1)){
    echo "seats were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($connn);
?>