<?php
    include 'server.php';

    include 'adminhome.php';
    $id=2;
    $id = $_GET['id'];
    if( $id !=0 ){
        // echo $id;
        $sql2 = "DELETE FROM category WHERE tid = '$id' "; 
        mysqli_query($conn,$sql2) or die("Unsuccess");
    }
?>

    <div id="main-content">
            <?php $sql = "SELECT * FROM category" ;

                $result = mysqli_query($conn,$sql);
                
                if( mysqli_num_rows($result) >0 ){
                    $x=1;
                
            ?>
        <div style="overflow-x: auto; overflow-y:scroll;">
            <table >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while( $row = mysqli_fetch_assoc($result) ){ 
                        ?>
                        <tr>
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $row['tcategory'] ?></td>
                            <td><a onclick="javascript:detecategory($(this));return false;" href="managecategory.php?id=<?php echo $row['tid'] ?>">Delte</a></td>
                            <script>
                                function detecategory(anchor){
                                    // if( confirm('Are You Sure Want To Delete This Data ?') === true) {
                                    //     window.location.assign('');
                                    // }
                                    var conf = confirm('Are You Sure Want To Delete This Category?');
                                    if(conf)
                                    window.location = anchor.attr("href");
                                }
                        </script>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
            <?php }else{
                echo "<h2>Not Present Any Category</h2>";
            }
            ?>
  </body>
</html>

