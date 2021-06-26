<?php 
  $id = $_GET['id'];
  $block = $_GET['block'];

  //echo $id . $block ;
  
  include 'server.php';   
 

    if($block >= 7 ){
        $sql = "UPDATE sessionpracticle SET block ='0' where id = '$id' ";
        mysqli_query($conn,$sql) or die("Unsuccess"); 

    }else{

        $sql = "UPDATE sessionpracticle SET block ='7' where id = '$id' ";
        mysqli_query($conn,$sql) or die("Unsuccess"); 
    }

    mysqli_close($conn);

    header("Location: alladmin.php?viewtype=user");
    
?>