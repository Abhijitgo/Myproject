<?php

    session_start();

    if(!isset($_SESSION["rand"])){
        $_SESSION["rand"] = rand(100000,999999);
    }

    // echo $_SESSION["rand"];

    if(isset($_POST['mailverify'])  ){
        if(!empty($_POST['mail']) ){

        $username = $_POST['mail'];

        // $password = $_POST['password'];

        include 'server.php';

        $sql = "SELECT name FROM usernamepass WHERE email_id = '{$username}' ";

        
        $result = mysqli_query($conn,$sql) or die("Query Unsuccessful") ;
        
        if(mysqli_num_rows($result) >0 ){

            // $varific = "123";

            // echo "<script>let given = (prompt('Enter Otp That send Your Email-Id',''));
            
            // while( +given !== $varific ){
            //     given = (prompt('Please Enter Correct Otp That Send to your Email-Id',''));
            //     if(given === null || given === '' ){
            //         alert('Sorry Verication Failed.\\n we Redirect to Login Page.');
                    
            //         window.location.assign('login.php');
            //         break;
            //     }
            //     console.log($varific,parseInt(given));
            // }
            // </script>";

            $row = mysqli_fetch_assoc($result);

            $str = $row['name'];

           $otp = $_SESSION["rand"];

           $_SESSION['username'] = $username;

            $fname = $str=substr($str, 0, strrpos($str, ' '));

            // echo $fname . "<br>";


            $email = 'sagardaa058@gmail.com';
            // echo $otp; 

            $message = "Hey ";
            $message = $message." ".$fname.", " ;
            $message = $message." "."Your One Time Password is {$otp} .";
            $message= $message."<br>"."Thanks For Using Our Site.";
            
            echo $message;
            
            // mail($username, "This is Mail From Sagar's Site", "Hey . '{$fname}' . Your One Time Password is {$otp}\r\n Thanks For Using Our Site", "From: 'Sagar'< $email>");

            echo "<script>alert('Otp has Sent Successfully.\\nCheck Your Email (Also into spam box).')</script>";

            // if( isset($_POST['otps']) ){

            //     $givenotp = $_POST['otpsubmit'];

            //         if($givenotp == $otp){
            //             $sql2 = "UPDATE usernamepass SET password = '${password}' WHERE email_id = '${username}' ";

            //             $result2 = mysqli_query($conn,$sql2) or die("Query Unsuccessful");

            //             echo "<script>alert('Your PassWord Is Updated.\\n Now You Can Login.');
            //             window.location.assign('login.php');
            //             </script>";
            //         }
            //         else{
            //             echo "<script>alert('Invalid otp.\\nPlease check your code and try again');</script>";
            //         }
            //     }


            }
            else{
                echo "<script>alert('Sorry. Not Present Any Account With This Email-ID.');
                
                </script>";
                // header("location: forgotpass.php");
                }
                mysqli_close($conn);

            }
            else{
                echo "<script>alert('You Did Not Write Email-Id.\\nFill This.');</script>";
            }
        }

        if( isset($_POST['otps'])){
            
            // echo $_POST['otpsubmit'],$_SESSION["rand"];


            if( $_SESSION["rand"] != $_POST['otpsubmit'] ){

            echo "<script>alert('Invalid Otp');
            </script>";
            
            }else{


                echo "<script>alert('Otp Verification Successful. Wohooh')</script>";

                // $username = $_SESSION['username'] ;

                // echo $_SESSION['username'];

                // include 'server.php';

                // $sql = "SELECT * FROM usernamepass WHERE email_id = '{$username}' ";

        
                // $result = mysqli_query($conn,$sql) or die("Query Unsuccessful") ;

                // $row = mysqli_fetch_assoc($result);


                // $rid = $row['id'];

                // echo $row['id'];

                

                // echo "window.location.assign(newpassword.php?id=<?php echo $row['id'] )";

                header("location: newpassword.php");

              
                
            }
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css" type="text/css">
    <style>
        .closeopen{
            margin: 0;
        }
        .openclose{
            display: none;
            padding: 0;
        }
        .loginbox{
            height: auto;
        }
        #otpbox{
            color: white;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            font-size: 16px;
            background: transparent;
            height: 40x;
        }
    </style>
    <title>Forgot Password</title>
</head>
<body>
    <div class="loginbox" id="loginbox">
        <img  src="Gallery/loginlogo2.png" alt="" >
        <h1>Forgot Your Password?</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="POST" >
            <p>Enter Gmail-Id:</p>
            <input type="email" placeholder="Registered Gmail-Id" id="mail" name="mail" autofocus>
            <input type="submit" value="Send Otp" id="mailverify" name="mailverify" >
        </form>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="closeopen">
                <input id="otpbox" type="text" name="otpsubmit" placeholder="Enter Otp" >
                <input type="submit"  value="Submit" name="otps" >
            </div> 
        </form>

        <form action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="openclose">
                <p>Enter New PassWord:</p>
                <input type="password" id="password" name="password" placeholder=" New Password">
                <input type="submit" id="change" name="change" value="Reset My Passpord">
            </div>
        </form>
        <a href="login.php" id="forgotpass" style="font-size: 1.16em; color: yellow; font-weight: 600;" >Back to Login Page?</a>
    </div>
</body>
</html>
