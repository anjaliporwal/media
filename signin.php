<?php
    session_start();
    include 'connection.php';
    include 'functions.php';

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $pwd= $_POST['pwd'];
        $pwd2= $_POST['pwd2'];
        $gender=$_POST['gender'];
        $birthday=$_POST['dob'];
        $status = "verified";
        $posts = "no";
        $profile_pic = "profile.png";
        $cover = "bg.jpg";
    }

    if(!empty($name) && !empty($pwd) && !empty($pwd2) && !empty($email)){
        if($pwd === $pwd2){
            $query="INSERT INTO users(username,email,pwd,gender,dob,bio,user_profile,cover,user_status,post,recover_account)values('$name', '$email','$pwd','$gender','$birthday','.....','$profile_pic','$cover','$status','$posts','Hey there!')";
            mysqli_query($conn, $query);
            $_SESSION['email']=$email;
            $_SESSION['username'] = $name;
            header("Location: login.php");
            die;
        }else{
            echo "<script type='text/javascript'>alert('Password mismatch.');</script>";
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>mediapro.in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            h2{
                font-family: Tahoma, Geneva, Verdana, sans-serif;
                font-weight: bold;
                color: rgb(67, 71, 75);
                text-align: center;

            }
        </style>
    </head>
    <body>
        <?php require 'navbar.php'; ?>
        <div class="container mt-3">
            <h2>SignUp</h2>
            <form method="post">
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name" required>
                </div> 
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                </div>
                <div class="form-group">
                    <label for="pwd2">Confirm password:</label>
                    <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pwd2" required>
                </div>  
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control input-md" name="gender" required="required">
                        <option disabled>Select your Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
				</div>
                <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" class="form-control input-md" placeholder="dob" name="dob" required="required">
				</div>
                <a style="text-decoration: none;float: right;color: cornflowerblue;" data-toggle="tooltip" title="login" href="signin.php">Already have an account?</a>
                <input type="submit" class="btn btn-dark" value="Sign up" name="signup"><br><br><br><br>
            </form>
            
        </div>
        <?php require 'footer.php'; ?>
    </body> 
</html>
