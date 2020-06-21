<?php

include 'database.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){

    extract($_POST);

    if($pass==$cpass){
    $select = mysqli_query($conn, "SELECT * from users where email= '$email' ");
    $num = mysqli_num_rows($select);

    if($num==0){
       
        $target_path = "";  
        $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
        $insert = mysqli_query($conn, "INSERT into users(name,email,password,mobile,image) VALUES('$name','$email','$pass','$mobile','$target_path')");
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
            echo "Successfully!";  
            // echo "<img src=".$target_path.">";
        } else{  
            echo "Sorry, file not uploaded, please try again!";  
        }  
    }
    else{
        $error_message = "Email Address already exist ! Please Sign Up!";
    }
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
        <h1>Register Here!</h1>
        <p><?php echo $error_message;?></p>
        <form method="POST" action ="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:20%" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:20%" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width:20%" name="mobile">
        </div>
        <input type="file" name="fileToUpload"/>  
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" style="width:20%" name="pass">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" style="width:20%" name="cpass">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    <h5>Already a User!</h5>
        <a href="login.php">Login Here!</a>
    </div>
    </body>
</html>