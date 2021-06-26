<?php 

    
    include 'adminhome.php';
    
    include 'server.php';

    $sql = "SELECT * FROM docs JOIN category WHERE docs.scat = category.tid ";

    $result = mysqli_query($conn, $sql)  or die("Query Unsuccessful");

    if(mysqli_num_rows($result) >0 ){
        
?>
    <div id="main-content">
    <h2>All Records</h2>
    <div style="overflow-x: auto;">
    <table class="table">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Category</th>
                <th>File</th>
                <th>Uploaded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $row = mysqli_fetch_assoc($result) ){
             ?>
            <tr>
                <td><?php echo $row['sname'] ?> </td>
                <td><?php echo $row['tcategory'] ?> </td>
                <td> <?php echo $row['sfile'] ?><a class="chang" href="pdfview.php?id=<?php echo $row['id'] ?>">View</a> </td>
                <td><?php echo $row['upload_by'] ?></td>
                <td>
                    <a href="update-content.php?id=<?php echo $row['id'] ?> ">Edit</a>
                    <a style="cursor: pointer;" onclick="javascript:confirmdele($(this));return false;" href="delete-content.php?id=<?php echo $row['id'] ?>" >Delete</a>
                    <script>
                        function confirmdele(anchor){
                            
                            var conf = confirm('Are You Sure Want To Delete This Data ?');
                            if(conf)
                            window.location = anchor.attr("href");
                        }
                    </script>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <?php }else{
        echo "<h1 style='text-align: center; color:red; ' >Not Present Any File</h1>";
    }
    
    mysqli_close($conn);
    
    ?>
    </div>
  </body>
</html>



