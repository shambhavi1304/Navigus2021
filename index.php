<?php

include 'database.php';
error_reporting(0);
session_start();

$email = $_SESSION['email'];
$name =$_SESSION['name'];

if($_SESSION['flag']==true){

$select = mysqli_query($conn, "SELECT * from users where status = 'online' ");

?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <style>
    .pic{
        height:50px;
        width:50px;
        
        
        border-radius:30px;
        margin-left:-20px;
        box-shadow:0 0 10px;
    }
    #cover{
        margin-left: 100px;
    }
    </style>
    </head>
    <body>
        <center><h1>Index Page</h1></center>
        <h2 class="ml-5">Active Users</h2>
        <div style="display:flex" id="cover">
        <?php 
        while($row = mysqli_fetch_assoc($select)){
        ?>
        <div class="pic" style="background:url('<?php echo $row[image]?>');background-size:cover; "><center><b><h1 class="text-light"><?php echo strtoupper(substr($row['name'], 0, 1));?></h1></b></center></div>
        <?php }?>
        </div><br><br>
        <h2 class="ml-5">Past user visited!</h2>
        <table class="ml-5" border="1">
        <tr>
        <th>User</th>
        <th>E-mail</th>
        <th>TimeStamp</th>
        </tr>
        <?php 
        $select = mysqli_query($conn, "SELECT * from users where status = 'online' ");
        while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['time'];?></td>
        </tr>
        <?php }?>
        </table>
        <br>
        <a href="logout.php"><button class="ml-5">Logout</button></a>
    </body>
</html>
        <?php }
        else{
            header("location:login.php");
        }
        ?>