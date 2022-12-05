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

if($_REQUEST['email']){
$fullName = $_REQUEST['fullName'];
$email = $_REQUEST['email'];
$mobileNumber = $_REQUEST['mobileNumber'];
$inputState = $_REQUEST['inputState'];
$comment = $_REQUEST['comment'];
}

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

$mail->setFrom($email, 'Contact US Request'); 

 
// Add a recipient 
$mail->addAddress('carpooling.nwmsu@gmail.com'); 
 $mail->addCC($email); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'New Request Posted'; 
 
// Mail body content 
$bodyContent = '<h1>Below is the Query requested from the user.</h1>'; 
$bodyContent .= '<p>Email: <b>'.$email.'</b></p>';
$bodyContent .= '<p>FullName: <b>'.$fullName.'</b></p>'; 
$bodyContent .= '<p>Mobile Number: <b>'.$mobileNumber.'</b></p>'; 
$bodyContent .= '<p>Type: <b>'.$inputState.'</b></p>'; 
$bodyContent .= '<p>Query: <b>'.$comment.'</b></p>'; 
$bodyContent .= '<h4>If any of the above information is incorrect, please <a class="nav-link " href="#">Contact Us</a>  or email back to us soon. </h4>'; 
$mail->Body    = $bodyContent;
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo "New  request  posted";
}

mysqli_close($conn);
?>