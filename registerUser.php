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


if($_REQUEST['name']){
$name = $_REQUEST['name'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];
$city = $_REQUEST['city'];
}

<<<<<<< HEAD
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 

// Include library files 
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\Exception.php';
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp2\htdocs\PHPMailer\PHPMailer\src\SMTP.php';

$sql = "INSERT INTO userlogin(`name`,`password`,email,contact,city,isuserActive)VALUES('$name','$password','$email','$contact','$city',0)";
=======
$sql = "INSERT INTO userlogin(`name`,`password`,email,contact,city,isUserActive)VALUES('$name','$password','$email','$contact','$city',true) ";
>>>>>>> e798e886258239deea118fa0b5634e9e262c4ac6

if($conn->query($sql) == TRUE){
// Create an instance; Pass `true` to enable exceptions 
echo "New User Created Succesfully";

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
$mail->setFrom('carpooling.nwmsu@gmail.com', 'Onboarding Team'); 
 
// Add a recipient 
$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Welcome To Our Application'; 
 
// Mail body content 
$bodyContent = '<h1>Hello <b>'.$name.'</b>. You have successfuly registered with the below Email address to our portal</h1>'; 
$bodyContent .= '<p>Your Email is: <b>'.$email.'</b></p>';
$bodyContent .= '<p>Someone from our team would review your application and get back to you shortly. </p>';  
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}


} else{
    echo "Error in Creating an User" ;
}

mysqli_close($conn);
?>