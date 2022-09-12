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


if($_REQUEST['from']){
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$departureTime = $_REQUEST['departureTime'];
$arrivalTime = $_REQUEST['arrivalTime'];
$journeyDate = $_REQUEST['journeyDate'];
$driverName = $_REQUEST['driverName'];
$contactNumber = $_REQUEST['contactNumber'];
$availableSeats = $_REQUEST['seats'];
$fare = $_REQUEST['price'];
$carType = $_REQUEST['carType'];
}

$sql = "INSERT INTO ridedetails(`from`,`to`,departureTime,arrivalTime,journeyDate,driverName,contactNumber,availableSeats,fare,carType)
VALUES('$from','$to','$departureTime','$arrivalTime','$journeyDate','$driverName','$contactNumber','$availableSeats','$fare','$carType') ";

if($conn->query($sql) == TRUE){
    echo "New Ride Created Succesfully";
}
else{
    echo "Error in Creating an User" ;
}
// $result = mysqli_query($conn, $sql);
// echo($result);
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["userID"]. " - Name: " . $row["name"]. " - email ".$row["email"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }

mysqli_close($conn);
?>