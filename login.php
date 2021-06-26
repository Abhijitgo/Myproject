<?php
    session_start();

    if(isset($_SESSION['username'])){
        header('location: hometemplate.php');
    }else{
        session_destroy();
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/login.css" type="text/css">
    <script type="text/javascript" src="js/login.js" defer></script>
    <style>
        #nav{

            width: 100%;
            position: absolute;
            right: 0;
        }
        #nav .anc{
            text-decoration: none;
            color: #111d5e;
            font-size: large;
            font-weight: 600;
            float: right;
            padding: 10px;
        }
        .animg{
            padding: 10px;
        }
    </style>
    <title>Login Portal</title>
</head>
<body>
    <nav id="nav">
        <a class="animg" href="font.html"><img src="Gallery/home.jpg" height="50" width="50" alt="Home"></a>
        <a class="anc" href="#" >User Login</a>
        <a class="anc" href="admin.php">Admin Login</a>
    </nav>
    <div class="loginbox" id="loginbox">
        <img  src="Gallery/loginlogo2.png" alt="" >
        <h1>Login Here</h1>
        <form action="validation.php"  method="POST" >
            <p>UserName/Gmail-Id:</p>
            <input type="email" placeholder="Enter Gmail-id" id="username" name="username"  required autofocus >
            <p>Password:</p>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <input type="text" name="date" id="logindate" hidden>
            <input type="submit" name="login" onclick="tdate()" id="login" value="Sign In">
        </form>
       
            <!-- login form end 
            <?php
                if(isset( $_POST['login'] )){
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = md5($_POST['password']);

                    // $sql = ;

                }
            ?> -->
            <a id="goto-singup" >Don't have an account ?<span> Sign up here </span></a>
            <a href="forgotpass.php">Forgot Password?</a>
    </div>
    <div class="signupboxblock" id="signupbox">
        <img src="https://i.ibb.co/VvDff7N/singup.jpg" alt="">
        <h1>Sign Up</h1>
        <form action="register.php"  method="post" >
            <p>Name</p>
            <input type="text" id="newname" name="newname" placeholder="Enter Your Name" required>
            <p>Gmail-Id</p>
            <input type="email" id="newmail" name="newmail" placeholder="Enter Gmail Id" required>
            <p>Password</p>
            <input type="password" id="newpassword" name="newpassword" placeholder="Enter PassWord" required>
            
            <input type="text" name="signindate" id="signdate" hidden >
            
            <input type="submit" id="signup" name="signup" onclick="tdate()" value="Sign Up">
        </form>
            <!-- sign up form end -->
        <a href="#" id="goto-login">Already Have An Account?</a>
    </div>
    <script>
            logintime = document.getElementById('logindate');
            signtime = document.getElementById('signdate');
            function tdate(){
                let date = new Date();
                let timestr = date.toLocaleDateString();
                let array = [];
                let Currenttimevalue = '';
                for(let i = 0; i < timestr.length;i++){
                    if(timestr[i] == '/'){
                        array.push(Currenttimevalue);
                        Currenttimevalue = '';
//                        console.log('hi');
                    }else{
                        Currenttimevalue += timestr[i];

                    }
                }
                array.push(Currenttimevalue);
                Currenttimevalue = '';
                array.reverse();
                console.log(array);
                
                // time.value = date.toLocaleTimeString() + "<br/>" ;
                Currenttimevalue +=array[0] + '-';
                Currenttimevalue +=array[2] + '-';
                Currenttimevalue +=array[1] + ' ';
               
                if(parseInt(date.toLocaleTimeString().split(' ')[0].split(':')[0]) <= 12 &&
                parseInt(date.toLocaleTimeString().split(' ')[0].split(':')[0]) > 0  )
                Currenttimevalue += date.toLocaleTimeString().split(' ')[0];
                else{
                    if(parseInt(date.toLocaleTimeString().split(' ')[0].split(':')[0])-12  == 0){
                        Currenttimevalue +=  '12:';
                    }else
                    Currenttimevalue +=String(parseInt(date.toLocaleTimeString().split(' ')[0].split(':')[0])-12) + ':';
                    Currenttimevalue += date.toLocaleTimeString().split(' ')[0].split(':')[1] + ':';
                    Currenttimevalue +=date.toLocaleTimeString().split(' ')[0].split(':')[2] ;

                }
                logintime.value = Currenttimevalue;
                signtime.value = Currenttimevalue;
                
                // function reverseString(str) {
                //     var splitString = str.split(""); // var splitString = "hello".split("");
                //     var reverseArray = splitString.reverse(); // var reverseArray = ["h", "e", "l", "l", "o"].reverse();
                //     var joinArray = reverseArray.join(""); // var joinArray = ["o", "l", "l", "e", "h"].join("");
                //     return joinArray; // "olleh"
                // }
 
                // Currenttimevalue = date.getFullYear().toString()+'-';
                // Currenttimevalue += date.getMonth().toString()+'-';
                // Currenttimevalue += date.getDate().toString() + ' ';
            }
            
        </script>

</body>
</html>