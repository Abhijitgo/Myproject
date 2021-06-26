<?php

    include 'server.php';
    session_start();

    if( $_FILES['cfile']['size'] > 2665228 )
    {
        echo "<script>alert('File Size should be under 2.5 mb');
           window.history.go(-1);
        </script>";
        
    }
    else{
        if(empty($_POST['cname']) || empty($_POST['category']) || !is_uploaded_file($_FILES['cfile']['tmp_name']) || !file_exists($_FILES['cfile']['tmp_name']) ){
            echo "<script>alert('All Fill Up Must be required');
            window.history.go(-1);
            </script>";

        }else{

            $file_type = $_FILES['cfile']['type'];

            //echo $file_type;

            if( $file_type!= "application/pdf" ){
                echo "<script>
                alert('Only pdf/docx Uploading Supported');
                window.history.go(-1);
                </script>";
            }else if( $file_type!= "application/octet-stream" ){
                echo "<script>
                alert('Only pdf/docx Uploading Supported2');
                window.history.go(-1);
                </script>";
            }
            else{
           
                $name = $_POST['cname'];
                $category= $_POST['category'];

                $uploadby = $_SESSION['username'];
                // $filename = $_FILES["cfile"]["name"];

                // $filename = rand(1,99999) . '.' . end(explode(".",$_FILES["cfile"]["name"]));

                $finame = $_FILES["cfile"]["name"];
                
                $filename = time() . '_' . rand(100, 9999) . '.' . end(explode(".",$finame));

                // echo $name . '<br>' . $category . '<br>' . $file  ;

           

                $sql = "INSERT INTO docs (sname,scat,sfile,upload_by) value ('$name','$category','$filename','$uploadby') ";

                $result = mysqli_query($conn,$sql);

                if($result){
                    move_uploaded_file($_FILES['cfile']['tmp_name'],"Files/$filename");
                    echo "<script>alert('File Uploaded Successful');
                    if(confirm('Want to go Admim home Page?') === false){
                        window.location.assign('add.php');
                    }else{
                        window.location.assign('content.php');
                    }
                    </script>";

                }else{
                    echo "<script>alert('File Does Not Uploaded');
                    window.history.go(-1);
                    </script>";
                }
            }
        }
    }
?>