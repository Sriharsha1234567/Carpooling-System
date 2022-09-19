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

