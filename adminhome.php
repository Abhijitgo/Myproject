<?php
    session_start();

    $_SESSION['time'] = time();
    if(!isset($_SESSION['adminusername']) ){
    
        session_destroy();

        header('Location: admin.php');
    
    }

    $str = $_SESSION['adminusername'];

    $name = substr($str, 0, strrpos($str, ' '));

    // else{
     

    //   echo $_SESSION['time']. '<br>';
    //   echo time();
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <meta http-equiv="refresh" content="50" />
    <link rel="stylesheet" href="Css/admin.css" type="text/css">
    <script  src="js/admin.js" type="text/javascript" defer ></script>
    <style>    
    @media screen and (max-width: 500px) {
        .dropdown{
            font-size: large;
        }
        
        thead{
            font-size: 10px;

        }
        tbody{
            font-size: 10px;
        }
        .table tbody tr td{
            padding: 0;
        }
        .table tbody tr td a{
            padding-bottom: 10px;
            box-sizing: border-box;
        }
    }
    
    .btnn{
        font-size: small;
    }
    #main-content button{
        outline: 0;
        font-size: 15px;
        padding: 8px;
        margin: 3px;
        border: 0;
        background-color: #ffa41a;
        color: #1b262c;
        font-weight: 600;
        cursor: pointer;

    }
    #main-content button:hover{
        background-color: #05dfd7;
    }

    .visible{
        display: block;
        pointer-events: all;
    }
    .notvisible{
        pointer-events: none;
        display: none;
    }
    .cate{
        display: none;
    }
    .down {
    transform: rotate(45deg);
    transform: rotate(45deg);
    }
    .arrow {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 5px;
    margin: 5px;
    }
    .btnfile{
        display: none;
    }
    .btnoff{
        display: none;
    }
    thead{
        text-align: center;
        font-weight: 600;
    }
    tbody{
        text-align: center;
        font-weight: 600;
    }
    .table tbody tr td{ 
        padding: 2px;

    }
    .wofile{
        display: none;
    }
    .chang{
        margin-left: 10px;
    }
    .uservis{
        display: none;
    }
    .admin-btn{
        display: none;
    }
    .admin-btn,.user-btn{
        outline: 0;
        font-size: 15px;
        padding: 8px;
        margin: 15px;
        border: 0;
        background-color: #ffa41a;
        color: #1b262c;
        font-weight: 600;
        cursor: pointer;
    }
    .admin-btn:hover,.user-btn:hover{
        background-color: #05dfd7;
    }
    </style>
    <title>Admin</title>
</head>
<body>
    <nav class="navb">
        <a href="#" class="navbar-brand"><img class="img" src="Gallery/logo.jpeg" alt="" width="50" height="50" ></a>      
        <ul>
            <li>
                <div class="dropdown">
                    <button class="btnn" id="dropdown" >Hi Admin :) <?php  echo $name; ?><i style="color: red;" class="arrow down"></i> </button>
                    <div id="dropcont" class="dropdown-content">
                        <p onclick="Logout()" id="study" >Logout</p>
                        <script>
                            function Logout(){
                                window.location.assign('adminlogout.php');
                            }
                        </script>
                    </div>
                </div>
            </li>
        </ul>

    </nav>

    <!-- <h1>Hi Admin</h1>
    <h2> <?php echo $name ?> </h2>
    <a href="adminlogout.php">Logout</a> -->

    <div id="wrapper">
        <div id="header">
            <h1>About My Site</h1>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a style="text-decoration: underline;text-decoration-color: red; " href="content.php">Home</a>
                </li>
                <li>
                    <a style="text-decoration: underline;text-decoration-color: green; " href="add.php">Add</a>
                </li>
                <li>
                    <a style="text-decoration: underline;text-decoration-color: green; " href="createadmin.php">New Admin</a>
                </li>
                <li>
                    <a style="text-decoration: underline;text-decoration-color: green; " href="alladmin.php">All Admin</a>
                </li>
                <li>
                    <a style="text-decoration: underline;text-decoration-color: green; " href="managecategory.php?id=0">Manage Category</a>
                </li>
                <li>
                    
                </li>
            </ul>
        </div>

    </body>
</html>
