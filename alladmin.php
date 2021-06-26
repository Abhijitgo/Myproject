<?php

    include 'adminhome.php';
    include 'server.php';

?>
    <button id="btnuser" class="user-btn" type="button" >User List</button>
    <!-- <button id="btnadmin" class="admin-btn" type="button" >Admin List</button> -->
    <script>
        if(window.location.href.toLowerCase() === 'http://localhost/my/alladmin.php'  ){
            // window.location.href = 'http://localhost/my/Cricket/index.html?view=list'; 
            // window.location.assign('http://localhost/my/Cricket/index.html?view=list');
            window.location.replace('/my/alladmin.php?viewtype=admin');

                // diff is use of replace() is it's not store prev url of in correct  
        }
        // to  view Url 
        function getUrlParameters(parameter, staticURL, decode){
            var currLocation = (staticURL.length)? staticURL : window.location.search,
                parArr = currLocation.split("?")[1].split("&"),
                returnBool = true;

            for(var i = 0; i < parArr.length; i++){
                parr = parArr[i].split("=");
                if(parr[0] == parameter){
                    return (decode) ? decodeURIComponent(parr[1]) : parr[1];
                    returnBool = true;
                }else{
                    returnBool = false;
                }
            }

            if(!returnBool) return false;  
        }
        let viewType = getUrlParameters("viewtype",window.location,true);

        

    </script>
    <div id="admin-vis">
        <div id="main-content">
            <h2>Admin List</h2>
            <?php $sql = "SELECT * FROM admin" ;

                $result = mysqli_query($conn,$sql);
                
                if( mysqli_num_rows($result) >0 ){
            
                
            ?>
        <div style="overflow-x: auto; overflow-y:scroll;height: 45vh;">
            <table >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email - Id</th>
                        <th>Mobile Number</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while( $row = mysqli_fetch_assoc($result) ){ 

                    ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email_id'] ?></td>
                        <td><?php echo $row['mob'] ?></td>
                        <td >
                            <!-- <a onclick="dele(deleteadmin.php?id=<?php echo $row['id'] ?>)" ></a> -->
                            <a style="background-color: white;padding:0; outline: 0;"  style="cursor: pointer;" onclick="javascript:confirmdelet($(this));return false;" href="deleteadmin.php?id=<?php echo $row['id'] ?>" ><img src="Gallery/delete1.png" width="40" alt="Delete" title="Delete"> </a>
                        <script>
                            function confirmdelet(anchor){
                                // if( confirm('Are You Sure Want To Delete This Data ?') === true) {
                                //     window.location.assign('');
                                // }
                                var confm = confirm('Are You Sure Want To Delete This Data ?');
                                if(confm)
                                window.location = anchor.attr("href");
                            }
                        </script>
                        
                        </td>
                        
                    </tr>
                    <script>
                            function dele(nun){
                                if(confirm('Are You Sure Want to Delete This Admin ?') === true){
                                    window.location.assign('deleteadmin.php?id=num');
                                }
                            }
                        </script>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
                <?php 
                
                }else{
                echo "Not Present Any Admin";
                }
                ?>
        </div>
    </div>

    <div class="uservis" id="uservis">
        <div id="main-content" >
            <h2>User List</h2>
            <?php $sql1 = "SELECT * FROM sessionpracticle" ;

                $result1 = mysqli_query($conn,$sql1) or die( "Unsuccessful");
                
                if( mysqli_num_rows($result1) >0 ){
                    $x=1;
                
            ?>
        <div style="overflow-x: auto; overflow-y:scroll;height: 45vh;">
            <table cellpadding="10">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email -Id</th>
                        <th>Block/ Unblock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  while( $row1 = mysqli_fetch_assoc($result1) ){

                    ?>
                    <tr>
                        <td><?php echo $x++;  ?></td>
                        <td><?php echo $row1['name'] ?></td>
                        <td><?php echo $row1['email_id'] ?></td>
                        <td>
                        <!-- href="blockorunblock.php?id= php echo $row1['id'] ?> " -->
                        <button onclick="window.location.assign('blockorunblock.php?id=<?php echo $row1['id'] ?>&block=<?php echo $row1['block'] ?> ')">
                                <?php 
                                    if( $row1['block'] >= 6  ) 
                                        echo 'Unblock';
                                    else{
                                        echo 'Block';
                                    }
                                    ?>
                            
                            </button>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
                <?php 
                
                }else{
                echo "Not Present Any Admin";
                }
                ?>
        </div>
    </div>
    <!-- <script async src="js/useralllist.js" async></script> -->
    <script>
            
                //type define
        if(viewType == 'user'){
            document.getElementById('btnuser').onclick = ()=>{
                window.location.replace('/my/alladmin.php?viewtype=admin');
            }
            document.getElementById('btnuser').textContent = "Admin List"; 
             
            document.getElementById('admin-vis').className = 'notvisible';
            document.getElementById('uservis').className = 'visible';

        }else{
            document.getElementById('btnuser').onclick = ()=>{
                window.location.replace('/my/alladmin.php?viewtype=user');
            }
            document.getElementById('btnuser').textContent = "User List"; 
            document.getElementById('admin-vis').className = 'visible';
            document.getElementById('uservis').className = 'notvisible';

        }

    </script>
    </body>
</html>

