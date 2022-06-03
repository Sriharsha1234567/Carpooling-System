<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpoolschema";

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connecting database connection
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

$sql = "INSERT INTO userlogin(`name`,`password`,email,contact,city,isAdmin)VALUES('$name','$password','$email','$contact','$city',0) ";

if($conn->query($sql) == TRUE){
    echo "New User Created Succesfully";
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