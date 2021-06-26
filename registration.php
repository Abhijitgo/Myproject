<?php

    session_start();

    $name = $_POST['newname'];
    $password = $_POST['newpassword'];
    $mail = strtolower($_POST['newmail']);

    $conn = mysqli_connect("localhost","root","","sessionpracticle") or die("Connection Unsuccessful") ;
    // if($conn){
    //     echo "Connection Successful";
    // }else{
    //     echo "Connection Unsuccessful";
    // }
    $sql=  "SELECT * FROM noteuser WHERE  email_id = '{$mail}' ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    if( $num >=  1){
        echo "<script>
        alert('Duplicate Data Found.\\nAlready Have An Account With This Email-Id.');
        window.history.go(-1);
        </script>";

        session_destroy();

    }else{

        if( $password == null || $name == null || $mail == null ){
            echo "<script>
                alert('Please Fill All The Details');
                window.history.go(-1);
            </script>";

        session_destroy();

        }
        else{
            $sql2 = "INSERT INTO noteuser (name,password,email_id) VALUES ('{$name}','{$password}','{$mail}' )";

            $result2 = mysqli_query($conn,$sql2);

            header ("Location: login.php ");

            mysqli_close($conn);
        }
    }

    

?>