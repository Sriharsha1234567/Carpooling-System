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

if($_REQUEST['email']){
    $userPassword = $_REQUEST['password'];
    $email = $_REQUEST['email'];
}

$sql = "SELECT * from userlogin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
if (($userPassword) == $row['password']){
echo $row['email'];
}
else{
    echo "0";
}
}
else {
    echo "0";
}

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