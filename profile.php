<?php
    session_start();
    if(!isset( $_SESSION['id'])){

        header("location: logout.php");
    
    }

    $lasttime = $_SESSION['lasttime'];

    $id = $_SESSION['id'];
    $name = $_SESSION['username'];

    if( strpos($name, ' ') !=null )
        $name = substr($name,0 , strpos($name,' '));

    if(isset($_POST['formsave'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        if($name != null || $email != null){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>
                alert('Email Id Format Not Correct');
                window.history.go(-1); 
                </script>";
            }else{
                include 'server.php';
                $id= $_POST['id'];
                // $sql3 = "SELECT * FROM sessionpracticle WHERE email_id NOT in (SELECT email_id from sessionpracticle WHERE  id = '$id')";
                // $result3 = mysqli_query($conn, $sql3);
                // if(mysqli_num_rows($result3) >0 ){
                //     echo "<script>
                //         alert('Sorry Already an Account Present With This Email-Id');
                //         window.history.go(-1); 
                //     </script>";
                // }else{
                    //echo $name .  $email;
                $sql2 = "update sessionpracticle set name = '$name' , email_id = '$email' where id = '$id' ";
                mysqli_query($conn,$sql2) or die("Sorry");
                
                echo "<script>
                        window.history.go(-1); 
                    </script>";
            
               
            }
        }else{
            echo "<script>
            alert('Fill Details');
            window.history.go(-1); 
            </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="35" />
      <meta http-equiv="refresh" content="1600;url=logout.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <link rel="stylesheet" href="Css/profile.css">
    <title><?php echo $name ?>'s Profile</title>
    <style>
        .icoedit i{
            transition: all 0.8s;
        }
    </style>
</head>
<body>
    <div class="background">
       <div class="back">
           <a onclick="back()" alt="Home" title="Home Page" style="cursor:pointer; color: #28df99; position:relative; left: 10px; top: 10px; " >
               <i  class="fa fa-backward fa-2x" aria-hidden="true"></i>
           </a>
       </div>
       <script>
           function back(){
               window.history.go(-1); 
           }
       </script>
        <div class="card-body ">
            <div class="container card col-md-7 col-xm-4">
                <?php 
                    include 'server.php';
                    
                    $sql = "select * from sessionpracticle Where id = '$id' "; 
                    
                    $result2 = mysqli_query($conn,$sql);
                    
                    $row = mysqli_fetch_assoc($result2);

                ?>
                <div id="profile">
                    <h2 id="formh2" style="text-align: center; color: red; "> Profile Info</h2>
                    <form  class="form" id="form" action="" method="POST">
                        <input  type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                        <p >Name :</p>
                            <input id="edit" type="text" name="name" value="<?php echo $row['name'] ?>" required  >
                        <p >Emali- Id :</p>
                            <input class="forminput" type="email"  name="email" value="<?php echo $row['email_id'] ?>" readonly required >
                        <p>Time Of Registration :</p>
                            <input type="text" class="forminput" value="<?php echo $row['Regdate'] ?>" readonly>
                        <p>Last Visiting Time :</p>
                            <input  type="text" class="forminput" value="<?php echo $lasttime ?>" readonly>
                        <input type="submit" name="formsave" value="Save" class="notvisible " id="save" >
                    </form>
                    
                    <div id="passbtn">
                        <button onclick="passchange()">
                            Password Change?
                        </button>
                        <div class="endform">
                            <a class="icoedit" title="Edit" onclick="edit()">
                                <i class="fas fa-edit fa-2x"></i>
                            </a>
                            <a class="icoedit" href="logout.php" title="Logout" >
                                <i class="fa fa-power-off fa-2x" aria-hidden="true"></i>
                            </a>
                        
                        </div>
                    </div>
            <?php   ?>
                </div>

                <div id="password" class="notvisible" >
                        <h3 style="text-align: center; color: red; ">Change Password</h3>
                    <form class="pass" action="passwordhome.php" method="post">
                        <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                        <p>Current Password :</p>
                            <!-- <i onclick="showpassword1()" class="fa faeye fa-eye" aria-hidden="true"></i> -->
                            <i id="showpass1" onclick="showpassword1()" class="fa faeye fa-eye-slash" title="show" aria-hidden="true"></i>
                            <input type="password" id="old" name="oldpass" autofocus required>
                        <p>New Password :</p>                   
                            <!-- <i class="fa faeye fa-eye" onclick="showpassword2()" aria-hidden="true"></i> -->
                            <i id="showpass2" onclick="showpassword2()"  class="fa faeye fa-eye-slash" title="show" aria-hidden="true"></i>
                            <input type="password" id="new" name="newpass" oninput="check()" required>
                        <p>Re-Enter New Password :</p>
                            <!-- <i class="fa faeye fa-eye" onclick="showpassword3()" title="show" aria-hidden="true"></i> -->
                            <i id="showpass3" onclick="showpassword3()" class="fa faeye fa-eye-slash" title="show" aria-hidden="true"></i>
                            <input type="password" id="renew" oninput="check()" name="Reenterpass" required>
                            <div id="output" class="output"></div>
                            <input type="submit" class="notvisible"  id="submit" value="Change">
                    </form>
                    <div id="formback">
                        <button onclick="passchange2()">
                            Back !!!
                        </button>
                    </div>
                </div>
            </div>
            <script>
                if(location.pathname === '/my/profile.php' && location.search.length == 0  ){
                    window.location.replace(window.location.pathname + '?edit=profile');
                }
                let profile = document.getElementById('profile');
                let passwordBox = document.getElementById('password');
               

                let editPath = getUrlParameters("edit",window.location,true);
                
                function passchange2(){
                    vibrator()
                    window.location.replace(window.location.pathname + '?edit=profile');
                }
                function passchange(){
                    window.location.replace(window.location.pathname + '?edit=password');
                }

                if(editPath === 'profile'){
                    profile.className = 'visible';
                    passwordBox.className = 'notvisible';
                }else if(editPath === 'password'){
                    profile.className = 'notvisible';
                    passwordBox.className = 'visible';
                }else{
                    window.location.replace(window.location.pathname + '?edit=profile');
                }

                // to  view Url 
                function getUrlParameters(parameter, staticURL, decode){
                    var currLocation = (staticURL.length)? staticURL : window.location.search,
                        parArr = currLocation.split("?")[1].split("&"),
                        returnBool = true;

                    for(var i = 0; i < parArr.length; i++){
                        parr = parArr[i].split("=");
                        if(parr[0] == parameter){
                            return (decode) ? decodeURIComponent(parr[1]) : parr[1];
                            returnBool = true;
                        }else{
                            returnBool = false;            
                        }
                    }

                    if(!returnBool) return false;  
                }
                function vibrator() {
                  // Vibrate for 30ms
                  navigator.vibrate([30]);
                }

                function showpassword1(){
                    vibrator();
                    if( document.getElementById('old').type === 'text'){
                        document.getElementById('old').type = 'password';
                        document.getElementById('showpass1').className = 'fa faeye fa-eye-slash';
                        document.getElementById('showpass1').title = 'show';
                    }else{
                        document.getElementById('old').type = 'text';
                        document.getElementById('showpass1').className = 'fa faeye fa-eye';
                        document.getElementById('showpass1').title = 'hide';
                    }
                }

                function showpassword2(){
                    vibrator()
                    if( document.getElementById('new').type === 'text' ){
                        document.getElementById('new').type = 'password';
                        document.getElementById('showpass2').className = 'fa faeye fa-eye-slash';
                        document.getElementById('showpass2').title = 'show';
                        
                    }else{
                        document.getElementById('new').type = 'text';
                        document.getElementById('showpass2').className = 'fa faeye fa-eye';
                        document.getElementById('showpass2').title = 'hide';
                        
                    }
                }
              
                function showpassword3(){
                    vibrator()
                    if( document.getElementById('renew').type === 'text'){                        
                        document.getElementById('renew').type = 'password';
                        document.getElementById('showpass3').className = 'fa faeye fa-eye-slash';
                        document.getElementById('showpass3').title = 'show';
                    }else{
                        document.getElementById('renew').type = 'text';
                        document.getElementById('showpass3').className = 'fa faeye fa-eye';
                        document.getElementById('showpass3').title = 'hide';
                    }
                }
                
                let newpassvalue = document.getElementById('new').value;
                function check(){
                    newpassvalue = document.getElementById('new').value;
                    if( newpassvalue!=="" && document.getElementById('renew').value !=="" && newpassvalue!==document.getElementById('renew').value ){
                        document.getElementById('output').textContent= "Passwords Does Not Match";
                       // document.getElementById('output').classList.toggle('bg-success');
                       document.getElementById('submit').className = 'notvisible';
                        document.getElementById('output').className = 'output bg-danger';
                    }else if(newpassvalue!=="" && document.getElementById('renew').value !=="" && newpassvalue === document.getElementById('renew').value ){
                        //document.getElementById('output').classList.toggle('bg-danger');
                        document.getElementById('submit').className = 'visible';
                        document.getElementById('output').className = 'output bg-success';
                        document.getElementById('output').textContent= " Passwords matched, Now you can click on change";
                    }else{
                        document.getElementById('submit').className = 'notvisible';
                        document.getElementById('output').className = '';
                        document.getElementById('output').textContent= "";
                    }

                }

                const save = document.getElementById('save');
                function edit(){
                    save.classList.toggle('visible');
                }
                    
            </script>
        </div>

    </div>

</body>
</html>