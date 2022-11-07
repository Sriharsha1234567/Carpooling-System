<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM userlogin WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $dbPassword = $row['password'];
            if($password === $dbPassword){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE userlogin SET status = '{$status}' WHERE email = '{$email}'");
                if($sql2){
                    $_SESSION['email'] = $email;
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{ 
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>