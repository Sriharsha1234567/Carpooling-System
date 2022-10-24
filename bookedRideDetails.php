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

$driverEmail = $_REQUEST['driverEmail'];
$userEmail = $_REQUEST['userEmail'];
}

$sql = "INSERT INTO bookedridedetails(`rideID`,`userID`,totalSeats,totalFare,bookingID,bookingStatus)VALUES('$rideID','$userID','$totalSeats','$totalPrice','$bookingID','Booked') ";

if($conn->query($sql) == TRUE){
    echo "New Record Created Succesfully";

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
        $mail->addAddress($userEmail); 
        $mail->addCC($driverEmail); 
        //$mail->addBCC('bcc@example.com'); 
         
        // Set email format to HTML 
        $mail->isHTML(true); 
         
        // Mail subject 
        $mail->Subject = 'New Ride Booked'; 
         
        // Mail body content 
        $bodyContent = '<h1>Hurray Your New Ride has been booked successfully. Below are the Ride Details</h1>'; 
        $bodyContent .= '<p>Your Booking ID is: <b>'.$bookingID.'</b></p>';
        $bodyContent .= '<p>Driver Email: <b>'.$driverEmail.'</b></p>'; 
        $bodyContent .= '<p>Passanger Email: <b>'.$userEmail.'</b></p>'; 
        $bodyContent .= '<p>Total Seats: <b>'.$totalSeats.'</b></p>'; 
        $bodyContent .= '<p>Total Price: $<b>'.$totalPrice.'</b></p>';
        $bodyContent .= '<h4>We have cced your Driver and Passanger here in this email. You can reach out to them here in this email for any queries.</h4>'; 
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
    echo "Error in inserting an record" ;
}

mysqli_close($conn);
?>

