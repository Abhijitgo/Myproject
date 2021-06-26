<?php

    include 'adminhome.php';
     
    include 'server.php';
    $id = $_GET['id'];

    if(isset($_POST['updatename'])){
        if( empty( $_POST['ucategory1']) || empty($_POST['uname1']) ){
            echo "<script>alert('Fill All The Details');
            window.history.go(-1);
            </script>";
        }else{
            $newwithoutcate = $_POST['ucategory1'];

            $newwithoutname = $_POST['uname1'];
            
            $usid = $_POST['uid1'];

            $sql5 = "UPDATE docs SET sname = '$newwithoutname', scat = '{$newwithoutcate}' WHERE id = {$usid} ";

            $result = mysqli_query($conn,$sql5) or die("Query Unsuccessful");

            echo "<script>alert('Data Update Successful');
            window.location.assign('content.php');
            </script>
            ";

            // header("location: ");

            mysqli_close($conn);


        }
    }

?>


<div id="main-content">
    <h2>Update Record</h2>
    <button id="btnupdate" type="button" >Not All ?</button>
    <button id="btnupdatefile" class="btnfile" type="button" >All ?</button>
    <?php 
        $id = $_GET['id'];

        $sql = "SELECT * FROM docs WHERE id = {$id}";

        $result = mysqli_query($conn,$sql)  or die("Query Unsuccessful");

        if(mysqli_num_rows($result) >0 ){
            
            while( $row = mysqli_fetch_assoc($result) ){

    ?>


    <form id="wf" class="post-form " enctype="multipart/form-data" action="updatedata.php" method="post">
      <div class="form-group">
          <label>File Name</label>
          <input type="hidden" name="uid" value="<?php echo $row['id'] ?>"/>
          <input type="text" name="uname" value="<?php echo $row['sname'] ?>"/>
      </div>
      <div class="form-group">
          <label>Category</label>
          <?php
                $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn,$sql1) or die("Query Unsuccessful.");

                if(mysqli_num_rows($result1) > 0){
                    echo '<select name="ucategory">';
                    while($row1 = mysqli_fetch_assoc($result1)){
                        if($row['scat'] == $row1['tid'] ){
                            $select = "selected";
                        }else{
                            $select= "";
                        }

                    echo "<option {$select} value='{$row1['tid']}'>{$row1['tcategory']}</option>";
                    }
            
          echo "</select>" ;
                }
          ?>
      </div>
      <div class="form-group">
          <label>File</label>
          <input type="file" name="ufile" value="Files/<?php echo $row['sfile'] ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
        <?php }
        }
        
        ?>
            <!--         Wof File           -->

         
         <?php 

        $sql3 = "SELECT * FROM docs WHERE id = {$id}";

        $result3 = mysqli_query($conn,$sql3)  or die("Query Unsuccessful");

        if(mysqli_num_rows($result3) >0 ){
            
            while( $row3 = mysqli_fetch_assoc($result3) ){

    ?>


    <form id="wof" class="post-form wofile" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-group">
          <label>File Name</label>
          <input type="hidden" name="uid1" value="<?php echo $row3['id'] ?>"/>
          <input type="text" name="uname1" value="<?php echo $row3['sname'] ?>"/>
      </div>
      <div class="form-group">
          <label>Category</label>
          <?php
                $sql4 = "SELECT * FROM category";
                $result4 = mysqli_query($conn,$sql4) or die("Query Unsuccessful.");

                if(mysqli_num_rows($result4) > 0){
                    echo '<select name="ucategory1">';
                    while($row4 = mysqli_fetch_assoc($result4)){
                        if($row3['scat'] == $row4['tid'] ){
                            $select2 = "selected";
                        }else{
                            $select2= "";
                        }

                    echo "<option {$select2} value='{$row4['tid']}'>{$row4['tcategory']}</option>";
                    }
            
          echo "</select>" ;
                }
          ?>
      </div>
      
      <input class="submit" type="submit" value="Update" name="updatename"/>
    </form>
        <?php }
        }
         ?> 
    </div>
    <script async src="js/Fileupdate.js" ></script>

</body>
</html>
