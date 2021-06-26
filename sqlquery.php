<?php

    include 'adminhome.php';
    
    if(isset($_POST['submit'])){
        $query = $_POST['sqlq'];
        if( $query == null ){
            echo "<script>
            alert('You did not write Anything');
            </script>";
        }else
        {
            include 'server.php';
            $result =  mysqli_query($conn,$query) or die("It's Not Correct Query Rewrite It Correctly") ;

            if( mysqli_num_rows($result) > 0 ){
                echo "Successfully Executed";
            }

            mysqli_close($conn);
        }
    }

?>

    <div id="main-content">
        <h2>Write Sql Query</h2>
        <form class="post-form" method="post">
            <div class="form-group">
            <label for="aname">Write Query</label>
                <textarea name="sqlq" id="" style="width: 100%;"  rows="5" autofocus></textarea>
            </div>
            <input type="submit" name="submit" value="Go" class="submit">
        </form>
    </div>
  </body>
</html>