<?php

    $name = $_POST['aname'];
    $mob =  $_POST['amob'];
    $email = $_POST['amail'];
    $password = $_POST['apassword'];

    // echo $name,$mob,$email,$password;

    include 'server.php';

    if( empty($name) || empty($mob) || empty($email) || empty($password)  ){
        echo "<script>alert('Fill All The Details.');
        window.history.go(-1);
        </script>";
    }
    else{

        $sql2= "SELECT * FROM admin WHERE email_id = '$email'";

        $result2 = mysqli_query($conn,$sql2);

        if( mysqli_num_rows($result2) >0 ){
            echo "<script>alert('Duplicate Data Found,\\nEmail-Id already registered');
                window.history.go(-1);
            </script>";

        }else{

            $sql = "INSERT INTO admin (name,mob,email_id,password) VALUES ('{$name}', '{$mob}', '{$email}','{$password}' )";

            $result =  mysqli_query($conn,$sql) or die("Query Unsuccessful") ;

            // header("location: ");

            echo "<script>alert('Data Saved Successful\\nCongratulations He is new Admin of this Site.');
            window.location.assign('alladmin.php');
            </script>";

        }

        mysqli_close($conn);

    }

?>