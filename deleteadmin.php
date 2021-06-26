<?php


    $sagar = $_GET['id'];

   
    
    if( $sagar ==1 ){
        echo "<script>
        alert('He is default Admin,It can not be deleted.');
        window.history.go(-1);
        </script>";
    }else{

        include 'server.php';

        $sql = "DELETE FROM admin WHERE id = $sagar";

        $result = mysqli_query($conn,$sql)  or die("Query Unsuccessful");

        
        echo "<script>
        alert('That Admin removed Successfully');
        window.history.go(-1);
        </script>";
        
        $mysqli_close($conn);
    }


?>