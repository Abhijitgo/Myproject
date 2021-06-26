<?php
    include 'server.php';
    session_start();

    $_SESSION['time'] = time();
    if(!isset($_SESSION['username']) ){
    
        session_destroy();

        header('Location: login.php');
    
    }

    $str = $_SESSION['username'];

    $st = strrpos($str, ' ');

    $name;

    if( $st!= null ){

      $name = substr($str, 0, $st);
    
    }
  else
  {

    $name = $_SESSION['username'];
  } 
  

    // else{
     

    //   echo $_SESSION['time']. '<br>';
    //   echo time();
    // }


?>

<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Login Portal</title>
      <meta http-equiv="refresh" content="30" />
      <!-- <meta http-equiv="refresh" content="1900;url=logout.php" /> -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="Css/home.css" type="text/css">
      <script  src="js/home.js" type="text/javascript" defer ></script>
    <style>
      h1{
        text-align: center;
        color: #ff5722;
        background: #e0ece4;
        font-size: 1.8em;
        padding: 10px;
        outline: 0;
        opacity: 1;
      }
      .fstim{
        background: url(Gallery/book31.jpg) #456455;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #a3d2ca;
        background-size: cover;
        height: 89vh;
        width: 100%;
      }
      .navb{
        background: #00B9e1;
      }
      .content{
          background-color: #91d18b;
          height: 100vh;
      }
      .up {
        transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
      }
      .arrowup{
          border: solid black;
          border-width: 0 3px 3px 0;
          display: inline-block;
          padding: 5px;
          margin-top: 5px;
      }
      .dropdown-invisible{
         display: none;
        }
      .div{
        float: left;
        padding: 10px;
        text-align: center;
      }
      table{
        background: #91d18b;
      }
      tbody{
        text-align: center;
      }
      tbody tr td{
        padding-bottom: 15px;
      }
      thead{
        text-align: center;
      }
      thead tr td{
        margin-bottom: 130px;

      }
      #dropcont a{
        color: orange;
        font-weight: 600;
        font-size: 15px;
      }
      #dropcont a:hover{
        text-decoration: none;
        color: red;
      }
      #list{
        width: 100%;
        position: relative;

      }
      @media screen and (max-height: 450px) {
        .overlay a {font-size: 20px}
        .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
        }
      }
    @media screen and (max-width: 500px) {
        .overlay a {
          font-size: 15px;
      }
      thead tr th{
        margin-top: 220px;
      }
      .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
      }
      .fileimg{
        width: 43%;
         height: 29%;
      }
    }

    </style>
    </head>
    <body >
      <!--                 navbar open                -->

    <nav class="navb">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <script>
      function openNav() {
        document.getElementById("myNav").style.width = "35%";
      }
      
      function closeNav() {
        document.getElementById("myNav").style.width = "0%";
      }
      </script>
    <a href="hometemplate.php" class="navbar-brand"><img class="img" src="https://i.ibb.co/6sgCpyW/logo.jpg" alt="" width="60" height="50" ></a>      
      <ul>
        <li>
          <div class="dropdown" style="margin: 0;">
                <button id="dropdown" style="color: black;">Hi: <?php  echo $name ?><i id="arrowi" class="arrow down"></i> </button>
                  <div id="dropcont" class="dropdown-content">
                    <a style="margin: 0; min-width: 90px;padding: 0 30px 0 0 ; font-size: 15px " href="profile.php">
                    <i class="fa fa-user-md " style="font-size: 25px;display:inline;" aria-hidden="true"></i>&nbsp;My&nbsp;Profile
                    <!-- <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> -->
                    </a>
                     <hr style="border: 0; border-style: none; height: 2px; background-color: black; margin:0; width:100%; " ;>
                    <a href="logout.php" style="margin:0; min-width: 90px;padding: 5px 30px 0 0 ; font-size: 15px " id="study" >
                      <i class="fa fa-sign-out" style="font-size: 25px;padding-top: 5px;display:inline;"  aria-hidden="true"></i>  
                      &nbsp;Logout
                    </a>
                    </div>
            </div>
          </li>
      </ul>
    </nav>
              <!--               navbar closed              -->
      
      <script>
    //     $(document).ready(()=>{
    //     $(document).click(function(e) {
    //       if( document.getElementById("myNav").style.width === "35%"){
    //     if ($(e.target).is('#myNav, #myNav *')) {
    //                 return;
    //             }
    //         closeNav();
    //       }
    //       else{
    //         return;
    //         alert('Click')
    //       }
    //     });
    // })
      
      </script>


      <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="overlay-content">
            <?php
                  $sql = "SELECT * from category";

                  $result = mysqli_query($conn,$sql) or die("Unsuccessful") ;
                  
                  if( mysqli_num_rows($result) >0 ){

                    while( $row = mysqli_fetch_assoc($result)  ){
            ?>
            <a href="gotopage.php?id=<?php echo $row['tid'] ?>" ><?php echo $row['tcategory'] ?> </a>
            <?php
                }
            }
          ?>
          </div>
      </div>


      <!-- <div class="content">
          <div id="gate" class="box  gate"><h2>Gate Study Material</h2> 
        
            <div class="container">
                <p>We Will Be Updated Soon This Section. Stay tuned.</p>

            </div>

        </div>
          <div id="cat" class="box cat"><h2>Cat Study Material</h2></div>
          <div id="apti" class="box apti"><h2>Aptitude Study Material</h2> </div>
          <div id="rrb" class="box rrb"><h2>RRB Study Material</h2> </div>
      </div>

     
      <script>
        function show(n){
          //alert(n);
          if(a === 0){
            fst.style.display = 'none';
          }
          if(a!==0){
            switch (a ){
               case 1:
                 gate.style.display= 'none';
                 break;
              case 2:
                 cat.style.display = 'none';
                 break;
              case 3:
                 apti.style.display = 'none';
                 break;
              case 4:
                 rrb.style.display = 'none';
                 break;
            }
          }
          switch ( n ){
              case 1:
                 gate.style.display= 'block';
                 break;
              case 2:
                 cat.style.display = 'block';
                 break;
              case 3:
                 apti.style.display = 'block';
                 break;
              case 4:
                 rrb.style.display = 'block';
                 break;
            }
          console.log(a);
          a = n;
        }
      </script> 
  </body>
</html> -->
