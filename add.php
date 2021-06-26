<?php
    include 'adminhome.php';

    include 'server.php';

    if(isset($_POST['catsave'])){
        if(empty($_POST['catname']) ){
            echo "<script>alert('Fill The Category Name');
            window.location.go(-1);
            </script>";
    }else{

            $newcat = $_POST['catname'];

            $sqlc = "INSERT INTO category (tcategory) values ('$newcat')";

            $resultc = mysqli_query($conn,$sqlc);
            
            echo "<script>
            alert('Category Saved Successful');
            window.location.assign('add.php');
            </script>";
        }
    // if(isset($_POST['addfile'])){
    //     $name = $_POST['cname'];
    //     $category= $_POST['category'];
    //     $file= $_POST['cfile'] ;


    // }
    }

?>

 <div id="main-content">
    <h2>Add New Content</h2>
    <button id="btncat" type="button" >Add Category</button>
    <button id="btnfile" class="btnoff" type="button" >Add File</button>

    <form id="fileform"  class="post-form" enctype="multipart/form-data" method="post" action="create.php">
    <div class="form-group">
            <label>File Name</label>
            <input id="inp" type="text" name="cname" placeholder="Give Meaningful Name pls" />
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category" >
                <option value="" selected disabled >Select Category</option>
                
                <?php
                    $sql = "SELECT * FROM category" ;
                    
                    $result = mysqli_query($conn,$sql) or die("Query Unsuccessful") ;
                    
                    while( $row = mysqli_fetch_assoc($result) ){
                        
                        ?>
                
                <option value="<?php echo $row['tid'] ?>"><?php echo  $row['tcategory'] ?></option>
                
                <?php } ?>
            </select>
            </div>
            <div class="form-group">
                <label>File*(only .pdf/.doc)</label>
                <input type="file" name="cfile" accept=".doc,.docx,application/pdf,application/vnd.ms-excel"  />
            </div>
            <input class="submit" type="submit" name="addfile" value="Add It"  />
        </form>

    <!--            category form            -->

    <form id="catform" class="post-form cate" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label for="catname">Category Name</label>
            <input type="text" name="catname"  />
        </div>
        <input class="submit" name="catsave" type="submit" value="Save"  />
    </form>
    </div>
    

    <script async src="js/btntochange.js" ></script>

    <?php
     mysqli_close($conn);
    
    ?>

</body>
</html>
