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
require 'C:\xampp\htdocs\PHPMailer\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\PHPMailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHPMailer\PHPMailer\src\SMTP.php';

if($_REQUEST['changeEmail']){
  $changeEmail = $_REQUEST['changeEmail'];
  $changePassword1 = $_REQUEST['changePassword1'];
  $changePassword2 = $_REQUEST['changePassword2'];
}

if($changeEmail != "" && $changePassword1 === $changePassword2) {
  $sql = "UPDATE userlogin SET password = '$changePassword1' where email='$changeEmail'";
  if(mysqli_query($conn, $sql)){
    echo "Password was updated successfully.";

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
$mail->addAddress($changeEmail); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'New Password'; 
 
// Mail body content 
$bodyContent = '<h1>You have changed your password through application portal.</h1>'; 
$bodyContent .= '<p>If you have not changed it please <a class="nav-link " href="#">Contact Us</a>  or email back to us soon.</p>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
} 
else{
  echo 'invalid Details';
}

mysqli_close($conn);
?>