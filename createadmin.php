<?php include 'adminhome.php' ?>

    <div id="main-content">
        <h2>New Admin Form</h2>
        <form class="post-form" action="savedata.php" method="post">
            <div class="form-group">
            <label for="aname">Name</label>
                <input type="text" name="aname" id="" placeholder="Enter Name" autofocus >
            </div>
            <div class="form-group">
                <label for="amob">Mobile Number</label>
                <input type="text" minlength="10" name="amob" placeholder="Enter Number" />
            </div>
            <div class="form-group">
                <label for="aemail">Email-Id</label>
                <input type="email" name="amail" placeholder="Enter Email-id" />
            </div>
            <div class="form-group">
                <label for="apassword">Password</label>
                <input type="password" name="apassword" placeholder="Enter Password"/>
            </div>
            <input type="submit" value="Register" class="submit">
        </form>
    </div>
  </body>
</html>
