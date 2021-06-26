<?php
    session_start();

    include 'server.php';

    $id = $_GET['id'];

    $sql = "SELECT sfile from docs where id = '{$id}'";

    $result = mysqli_query($conn,$sql);

    if( mysqli_num_rows($result) > 0 ){
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        iframe{
            width: 100%;
            height: 100vh;
            border:1px solid black;
        }
    </style>
    <title>Pdf View</title>
</head>
<body>
    <?php while($row = mysqli_fetch_assoc($result)){ 
        ?>
    <!-- <embed src="Files/<?php echo $row['sfile'] ?> " type=""> -->
    <iframe src="Files/<?php echo $row['sfile'] ?> " title="W3Schools Free Online Web Tutorials"></iframe>

    <?php }?>
</body>
</html>
    <?php  }
    else{
        echo "<script>window.location.assign('logout.php')</script>";
    } ?>
