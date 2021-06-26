<?php


    include 'home.php';
    $id = $_GET['id'];

    // echo $id;
?>

    <div id="grid">
        <div id="body" class="content">
            <?php
               
                    $sql1 = "SELECT * from docs WHERE scat='$id'";
    
                    $result1 = mysqli_query($conn,$sql1) or die("Query Unsuccessful") ;
                    if( mysqli_num_rows($result1) > 0 ){
    
                        ?> 
                        <a title="List View" onclick="listshow()"  style="cursor:pointer; position: absolute;top: 0%;overflow:visible; right: 15px;float: right;color: white;">
                            <i class="fa fa-list fa-2x" aria-hidden="true"></i>  
                        </a>
                    <div class="content-items"  >
                        <?php
    
                            while( $row1 = mysqli_fetch_assoc($result1) ){
    
                        ?>
                            <div class="div">
                                <a href="pdfview.php?id=<?php echo $row1['id'] ?>">
                                    <img src="Gallery/pdf.jpg" alt="<?php echo $row1['sname'] ?>" height="100" width="100" >
                                </a>
                                <!-- <object data="Files/<?php echo $row1['sfile'] ?>" type="application/pdf" >
                                    <a href="Files/<?php echo $row1['sfile'] ?>"></a>
                                </object> -->
                                <p>
                                    <?php echo $row1['sname'] ?>
                                </p>
                                <p>
                                    <a href="Files/<?php echo $row1['sfile'] ?>" download="<?php echo $row1['sname'] ?>"> 
                                        <button style="background-color: grey;" type="button">Download</button> 
                                    </a>
                                </p>
                            </div>
    
                            <?php } ?>
                    </div>
    
    
                    <?php }else{
                        echo "<h2>Sorry In This Section No More Content Available</h2>";
                    } ?>
          </div>
    </div>

    <div id="list" class="dropdown-invisible">
        <a title="Gallery View" onclick="listshow()"  style="cursor:pointer; position: absolute;top: 0%;overflow: visible; right: 15px;float: right;color: white;">
                    <i class="fa fa-th fa-2x" aria-hidden="true"></i>  
                </a>
            <?php
                
                $sql1 = "SELECT * from docs WHERE scat='$id'";

                $result1 = mysqli_query($conn,$sql1) or die("Query Unsuccessful") ;
                if( mysqli_num_rows($result1) > 0 ){
                    $x=1;
            ?> 
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Sl. No.</th>
                        <th>File Name</th>
                        <th>File</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        while( $row1 = mysqli_fetch_assoc($result1) ){
                    ?>
                    <tr>
                        <td><?php echo $x++ ?></td>
                        <td><?php echo $row1['sname'] ?></td>
                        <td>
                        <a href="pdfview.php?id=<?php echo $row1['id'] ?>">
                                        <img class="fileimg" src="Gallery/pdf.jpg" alt="<?php echo $row1['sname'] ?>" style="" height="100" width="100" >
                                    </a> 
                        </td>
                        <td>
                            <a href="Files/<?php echo $row1['sfile'] ?>" download="<?php echo $row1['sname'] ?>"> 
                                <button style="border: 2px solid;background-color: grey;color: #ffe75e;" type="button">Download</button> 
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

            <?php
                }else{
                    echo "<h2>Sorry In This Section No More Content Available</h2>";
                }
            ?>
    </div>

      <script>
          let grid = document.getElementById('grid');
          let list = document.getElementById('list');
          function listshow(){
                console.log(4545);
                grid.classList.toggle('dropdown-invisible');
                if(list.className == "dropdown-invisible")
                list.className = 'dropdown-visible';
                else{
                    list.className = "dropdown-invisible";
                }
          }
          list.addEventListener('click',check);
         let body = document.getElementById('body');
            body.addEventListener('click',check);
            function check(){
              if(dropcontant.className == 'dropdown-content dropdown-visible' )
                {
                    Logoutbtn();
                }    
            }

        </script>
    </body>
</html>