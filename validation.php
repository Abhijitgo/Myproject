<?php

    session_start();

    
    $password = $_POST['password'];
    $user = $_POST['username'];

    if( $password != null && $user == null ){
        echo "<script>alert('You Have Not Enter Email-id');
        window.history.go(-1);
        </script>";
    }else if( $password == null && $user != null ){
        echo "<script>alert('You Have Not Enter Password');
        window.history.go(-1);
        </script>";
    }
    else{

        include 'server.php';
    
        // if($conn){
        //     echo "Connection Successful";
        // }else{
        //     echo "Connection Unsuccessful";
        // }
    
        $sql=  "SELECT * FROM sessionpracticle WHERE email_id = '{$user}' && password = '{$password}' ";
    
        $result2 = mysqli_query($conn, $sql);
    
        $num = mysqli_num_rows($result2);
    
        if( $num ==  1){
    
            $row = mysqli_fetch_assoc($result2);
 
            $block_remain =  $row['block']+1 ;

            if($block_remain  >= 7 ){
                echo "<script>alert('Sorry, Your has Blocked Now Contact to Admin');
                    window.history.go(-1);
                </script>";
                
            }
            else{

                $_SESSION['lasttime'] = $row['Lastlogin'];
        
                $date = $_POST['date'];
        
                $sql2 = "UPDATE sessionpracticle SET Lastlogin = '$date',block = '0'  WHERE email_id = '$user' ";
        
                mysqli_query($conn,$sql2);
        
                $name = $row['name'];   // name extract of user
        
                $_SESSION['username'] = $name;
        
                $_SESSION['id'] = $row['id'];
                
                //    echo "<h1>{$name}</h1>";
    
                header('Location: hometemplate.php');
            }
    
        }  else{

            $sql=  "SELECT * FROM sessionpracticle  WHERE email_id = '{$user}'";
            
            $result = mysqli_query($conn, $sql);
    
            $num = mysqli_num_rows($result);

            if($num == 1){
                $row = mysqli_fetch_assoc($result);

                $block_remain =  $row['block']+1 ;

                if($block_remain  >= 6 ){
                    echo "<script>alert('Sorry, Your has Blocked Now Contact to Admin');
                        window.history.go(-1);
                    </script>";
                    $sql2 = "UPDATE sessionpracticle SET block = '$block_remain'  WHERE email_id = '$user' ";
                    mysqli_query($conn,$sql2);
                    

                }else{

                    $sql2 = "UPDATE sessionpracticle SET block = '$block_remain'  WHERE email_id = '$user' ";
    
                    mysqli_query($conn,$sql2);

                    $block_remain = 6 - $block_remain;
    
    
                    echo "<script>alert('You Have Entered Incorrect Password\\nYou Have $block_remain Attempt Remains');
                        window.history.go(-1);
                    </script>";
                }
                

            }else{

                echo "<script>alert('Dont have any Account With This Username');
                window.history.go(-1);
                </script>";
            }
        }
    }

    

?>