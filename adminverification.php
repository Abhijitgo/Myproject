<?php

    session_start();

    
    $password = $_POST['password'];
    $user = $_POST['username'];

    include 'server.php';
    // if($conn){
    //     echo "Connection Successful";
    // }else{
    //     echo "Connection Unsuccessful";
    // }
    $sql=  "SELECT * FROM admin WHERE email_id = '{$user}' && password = '{$password}' ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if( $num ==  1){

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];   // name extract of user

        $_SESSION['adminusername'] = $name; 

    //    echo "<h1>{$name}</h1>";

        header('Location: content.php');
       
    }else{


        if( $password != null && $user == null ){
            echo "<script>alert('You Have Not Enter Email-id');
            window.history.go(-1);
            </script>";
        }else if( $password == null && $user != null ){
            echo "<script>alert('You Have Not Enter Password');
            window.history.go(-1);
            </script>";
        }
        else{
            echo "<script>alert('You have Entered Incorrect Username or Password ');
            window.history.go(-1);
            </script>";
        }
    }

    

?>