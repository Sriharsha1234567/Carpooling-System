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
if (($userPassword) == $row['password'] && $row['isuserActive'] == 1){
    if($row['isAdmin'] == 1) {
        echo "Admin";
    } else if ($row['isAdmin'] == 0) {
        echo "User";
<<<<<<< HEAD
    } else if ($row['isuserDriver'] == 1) {
=======
    } else if ($row['isuserDriver'] == 0) {
>>>>>>> e798e886258239deea118fa0b5634e9e262c4ac6
        echo "UserDriver";   
    }
}
else{
    echo "0";
}
}
else {
    echo "0";
}

mysqli_close($conn);
?>