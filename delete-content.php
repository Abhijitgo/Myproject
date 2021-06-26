<?php

    include 'server.php';

    // echo "<script>
    // if(confirm('Are You Sure Want To Delete') === false){
    //     window.location.assign('content.php');
    // }
    // </script>";

    $id = $_GET['id'];

    $sql2= "select sfile from docs where id = '$id'  ";

    $result2 = mysqli_query($conn,$sql2);

    $row = mysqli_fetch_assoc($result2);

    $name= $row['sfile'];

    $path = "Files/$name";

    if(!unlink($path)){
        echo "<script>
        
        alert('File Not Found Issue happen');
        window.history.go(-1);
        </script>";
    }else{

        $sql = "DELETE FROM docs WHERE id = {$id}";
        
        $result = mysqli_query($conn,$sql) or die("Query Unsuccessful");

        mysqli_close($conn);


        echo "<script>
        alert('Data Delete Successful');
        window.location.assign('content.php');
        </script>";
    }
?>