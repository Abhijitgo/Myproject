<?php

    $name=$_REQUEST['name1'];
    $email=$_REQUEST['mail'];
    $commment=$_REQUEST['Comment'];
    $number = $_REQUEST['number'];
    if( empty($number) ){
        $number = "User not provided Any Mob Number";
    }


    if( empty($name) || empty( $email)  || empty( $commment) ){
    echo "<script type='text/javascript'> 
    alert('Please Fill All Of The Details Correctly.');
    window.history.go(-1);
        </script>";
    }else{
    mail("das99567@gmail.com", "From Contact, My Website" ,  $commment, "From:  $name< $email>\r\n$number");
    echo "<script type='text/javascript'> alert('Your message has send successfully.\\nThanks :-)');
    
        </script>";
        echo "<script type='text/javascript'> window.location.assign('contact.html')</script> ";
    }

?>

//  <?php

 // $name=$_REQUEST['name1'];
 // $email=$_REQUEST['mail'];
 // $commment=$_REQUEST['Comment'];
 // $number = $_REQUEST['number'];
 // if( empty($number) ){
     // $number = "User not provided Any Mob Number";
 // }


// if( empty($name) || empty( $email)  || empty( $commment) ){
   // echo "<script type='text/javascript'> 
   // alert('Please Fill All Of The Details Correctly.');
   // window.history.go(-1);
    // </script>";
// }else{
   // mail("das99567@gmail.com", "From Contact, My Website" ,  $commment, "From:  $name< $email>\r\n$number");
   // echo "<script type='text/javascript'> alert('Your message has send successfully.\\nThanks :-)');
   // window.history.go(-1);
    // </script>";
    
// }

//  <body onload="setTimeout('delayedRedirect()',10000)" >
// <script>
// function delayedRedirect() {
//    alert('Your Session has Expired Please Re - login Again');
//   window.location.assign("logout.php");
// }
// </script>
// -->

?>
