<?php

    session_start();

    if(!isset($_SESSION['username'])){
    
        session_destroy();

        header('Location: login.php');

    }
    // echo $rid;
        if(isset($_POST['passwordbtn'])){

            if( $_POST['newpass'] == null ||  $_POST['conpass'] == null ){
                echo "<script>alert('Enter Your Password.')</script>"; 
            }

            else if( $_POST['newpass'] != $_POST['conpass'] ){
                echo "<script>alert('Passwords Do Not Match')</script>";
            }
            else{
                include 'server.php';

                $password = $_POST['newpass'];

                $rid =  $_SESSION['username'];

                $sql2 = "UPDATE usernamepass SET password = '{$password}' WHERE email_id = '{$rid}' ";

                $result2 = mysqli_query($conn,$sql2) or die("Query Unsuccessful");

                session_destroy();

                echo "<script>alert('Your PassWord Is Updated.\\n Now You Can Login.');
                window.location.assign('login.php');
                </script>";
                
            }

        }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>New Password Create</title>
</head>
<body>
<div class="loginbox" id="loginbox">
        <img  src="Gallery/loginlogo2.png" alt="" >
        <h1>Password Reset</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="POST" >
            <p>New Password: </p>
            <input type="password" id="username" name="newpass" placeholder="Enter new password" autofocus>
            <p>Confirm Your Password:</p>
            <input type="password" id="password" name="conpass" placeholder="Re-enter new password">
            <input type="submit" name="passwordbtn" id="login" value="Update Password">
        </form>
    </div>

    
</body>
</html>





