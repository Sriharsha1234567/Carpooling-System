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

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 

// Include library files 
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\Exception.php';
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\SMTP.php';

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

$sql = "INSERT INTO ridedetails(`from`,`to`,departureTime,arrivalTime,journeyDate,driverName,driverEmail,availableSeats,fare,carType)
VALUES('$from','$to','$departureTime','$arrivalTime','$journeyDate','$driverName','$contactNumber','$availableSeats','$fare','$carType') ";

if($conn->query($sql) == TRUE){
echo "New Ride Created Succesfully";
    // Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer(TRUE); 
 
// Server settings 
$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'carpooling.nwmsu@gmail.com';       // SMTP username 
$mail->Password = 'yebhomkyliwpaupe';         // SMTP password 
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                         // TCP port to connect to 
 
// Sender info 
$mail->setFrom('carpooling.nwmsu@gmail.com', 'Rides Team'); 
 
// Add a recipient 
$mail->addAddress($contactNumber); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'New Ride Posted'; 
 
// Mail body content 
$bodyContent = '<h1>Hurray Your New Ride Request has been posted on Portal. Below are your Ride Details</h1>'; 
$bodyContent .= '<p>From: <b>'.$from.'</b></p>';
$bodyContent .= '<p>To: <b>'.$to.'</b></p>'; 
$bodyContent .= '<p>Departure Time: <b>'.$departureTime.'</b></p>'; 
$bodyContent .= '<p>Arrival Time: <b>'.$arrivalTime.'</b></p>'; 
$bodyContent .= '<p>Journey Date: <b>'.$journeyDate.'</b></p>'; 
$bodyContent .= '<p>Car Type: <b>'.$carType.'</b></p>'; 
$bodyContent .= '<p>Price: <b>'.$fare.'</b></p>';
$bodyContent .= '<p>Seats: <b>'.$availableSeats.'</b></p>';
$bodyContent .= '<h4>If any of the above information is incorrect, please <a class="nav-link " href="#">Contact Us</a>  or email back to us soon. </h4>'; 
$mail->Body    = $bodyContent;
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo "New Ride Created Succesfully";
}

}
else{
    echo "Error in Creating a Ride" ;
}

mysqli_close($conn);
?>