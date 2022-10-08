<?php
  session_start();

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
    $email = $_REQUEST['email'];
    $otp = $_REQUEST['OTP'];
}

if($email != "") {
  $sql = "SELECT * from userlogin where email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $fetch_user_name=$row['email'];
  $email_id=$row['email'];

if($email==$fetch_user_name) {

// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer(TRUE); 
 
// Server settings 
$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'carpoolingteam22@gmail.com';       // SMTP username 
$mail->Password = 'wrehttwoprtprrwk';         // SMTP password 
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                         // TCP port to connect to 
 
// Sender info 
$mail->setFrom('carpoolingteam22@gmail.com', 'Password Team'); 
 
// Add a recipient 
$mail->addAddress($email_id); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'OTP'; 
 
// Mail body content 
$bodyContent = '<h1>Please find your OTP below which is valid for 15 mins.</h1>'; 
$bodyContent .= '<p>Your Old Password is: <b>'.$otp.'</b></p>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}

}
} 
else{
  echo '0';
}

mysqli_close($conn);
?>

