<?php
    $id = $_POST['id'];
  
    $olspass=  $_POST['oldpass'];
  
    
    $sql = "SELECT * FROM `usernamepass` WHERE id= '$id' && password ='$olspass'";

    include 'server.php';

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $new = $_POST['newpass'];
        $renew = $_POST['Reenterpass'];
        
        if( $new != $renew ){
            echo "<script>
                alert('Entered New Passwords Does not Matched');
                window.history.go(-1); 
            </script>";
        }else{
            include 'server.php';
            $sql2 = "UPDATE usernamepass SET password = '$new' WHERE id = '$id' ";
            mysqli_query($conn,$sql2);
            mysqli_close($conn);
            echo "<script>
                alert('Password Changed :)');
                window.history.go(-1); 
            </script>";
        }

    }else{
        echo "<script>
            alert('Old password does not match ):\\nTry again');
            window.history.go(-1); 
        </script>";
    }

?>