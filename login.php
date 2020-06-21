<?php

include 'database.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){

    extract($_POST);

    $select = mysqli_query($conn, "SELECT * from users where email= '$email' ");
    $row =  mysqli_fetch_assoc($select);

    if($pass==$row['password']){
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['flag'] = true;
        // echo "Welcome ".$row['name'];
        header("location:index.php");
        
        date_default_timezone_set('Asia/Kolkata');
        $time = date("M d,Y h:i:s A", time());
        $update = mysqli_query($conn, "UPDATE users  SET time = '$time', status='online' where email = '$email' ");
    }
    else{
        $error_message = "Check Email Id or Password";
    }

}

?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="ml-5">
        <h1>Login </h1>
        <p><?php echo $error_message;?></p>
        <form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:20%" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" style="width:20%" name="pass">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button><br>
        <br><h5>Not a User!</h5>
        <a href="register.php">Register Here!</a>
        </form>
        </div>
    </body>
</html>