<?php

    include 'server.php';


    if( $_FILES['ufile']['size'] > 2665228 )
    {
        echo "<script>alert('File Size should be under 2.5 Mb');
           window.history.go(-1);
        </script>";
        
    }
    else{
        if(empty($_POST['uname']) || empty($_POST['ucategory']) || !is_uploaded_file($_FILES['ufile']['tmp_name']) || !file_exists($_FILES['ufile']['tmp_name']) ){
            echo "<script>alert('All Fill Up Must be required');
                window.history.go(-1);
            </script>";

        }else{

            $name = $_POST['uname'];

            $category= $_POST['ucategory'];

            $id = $_POST['uid'];

            // $filenam = $_FILES["cfile"]["name"];

            // $filenam = rand(1,99999) . '.' . end(explode(".",$_FILES["cfile"]["name"]));
            
            $filename = time() . '_' . rand(100, 999) . '.' . end(explode(".",$_FILES["ufile"]["name"]));
            
            // echo $name . '<br>' . $category . '<br>' . $file  ;

            $sql = "UPDATE docs SET sname = '$name', scat = '$category',sfile = '$filename' WHERE  id = {$id}  ";

            $result = mysqli_query($conn,$sql);

            if($result){
                move_uploaded_file($_FILES['ufile']['tmp_name'],"Files/$filename");
                echo "<script>alert('File Updated Successful');
                    window.location.assign('content.php');
                </script>";

            }else{
                echo "<script>alert('File Does Not Uploaded');
                    window.history.go(-1);
                </script>";
            }
        }
    }

?>