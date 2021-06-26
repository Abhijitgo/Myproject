<?php

    session_start();
    if(isset($_SESSION['adminusername'])){
        header('Location: content.php');
    }
    else{
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/login.css" type="text/css">
    <style>
        #nav{

            
            width: 100%;
            position: absolute;
            right: 0;
        }
        #nav .anc{
            text-decoration: none;
            color: #ff4b5c;
            font-size: large;
            font-weight: 600;
            float: right;
            padding: 10px;
        }
        .animg{
            padding: 10px;
        }
    </style>
    <title>Admin Portal</title>
</head>
<body>
    <nav id="nav">
        <a class="animg" href="font.html"><img src="Gallery/home.jpg" height="50" width="50" alt="Home"></a>
        <a class="anc" href="login.php">User Login</a>
        <a class="anc" href="#">Admin Login</a>
    </nav>
<div class="loginbox" id="loginbox">
        <img  src="Gallery/admin.png" alt="" >
        <h1>Administrative Login</h1>
        <form action="adminverification.php"  method="POST" >
            <p>UserName/Gmail-Id:</p>
            <input type="email" placeholder="Enter Gmail-id" id="username" name="username" autofocus>
            <p>Password:</p>
            <input type="password" id="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" id="login" value="Sign In">
        </form>
    </div>
</body>
</html>

