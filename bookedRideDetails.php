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
$rideID = $_REQUEST['rideID'];
$userID = $_REQUEST['userID'];
$totalSeats = $_REQUEST['totalSeats'];
$totalPrice = $_REQUEST['totalPrice'];
$bookingID = $_REQUEST['bookingID'];
}

$sql = "INSERT INTO bookedridedetails(`rideID`,`userID`,totalSeats,totalFare,bookingID,bookingStatus)VALUES('$rideID','$userID','$totalSeats','$totalPrice','$bookingID','Booked') ";

if($conn->query($sql) == TRUE){
    echo "New Record Created Succesfully";
}
else{
    echo "Error in inserting an record" ;
}

mysqli_close($conn);
?>

