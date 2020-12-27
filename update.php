<?php
    session_start();
    include 'connection.php';
    include 'functions.php';

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $old =$_POST["old"];  
        $new =$_POST["new"];


        if(!empty($old) && !empty($new)){
            $result = mysqli_query($conn, "SELECT * from users WHERE email='" . $_SESSION["email"] . "'");
            $row = mysqli_fetch_array($result);
            if ($old == $row["pwd"]) {
                mysqli_query($conn, "UPDATE users set pwd='" . $new . "' WHERE email='" . $_SESSION["email"] . "'");
                echo "<script  type='text/javascript' >alert('Password updated successfully');</script>"; 
                header("Location: index.php");
                die;
            }
            else{echo "<script type='text/javascript'>alert('Password mismatch');</script>";}  
            
        } 
        else{echo "<script type='text/javascript'>alert('Enter password.');</script>";}
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
        <?php require 'navbar2.php'; ?>
        <div class="container mt-4">
            <h2>Change password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="old">Old Password:</label>
                    <input type="password" class="form-control" id="old" placeholder="Enter old password" name="old" required>
                </div>
                <div class="form-group">
                    <label for="new">New password:</label>
                    <input type="password" class="form-control" id="new" placeholder="Enter new password" name="new" required>
                </div>  
                <input type="submit" class="btn btn-dark" value="Change password" name="change_password">
            </form>
            <?php require 'footer.php'; ?>
        </div>
        
    </body>
</html>

