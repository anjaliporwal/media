<?php
    session_start();

    include 'connection.php';
    include 'functions.php';

    $user_data = check_login($conn);
    $_SESSION['username']= $user_data['username'];
    $_SESSION['email']= $user_data['email'];

    $u_id=$user_data['id'];
    $name=$user_data['name'];
    $email=$user_data['email'];
    $pwd=$user_data['pwd'];
    $gender=$user_data['gender'];
    $birthday=$user_data['dob'];
    $bio=$user_data['bio'];
    $status=$user_data['user_status'];
    $posts=$user_data['posts'];
    $profile_pic=$user_data['user_profile'];
    $cover=$user_data['user_cover'];

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
            #profile{
                width: 100%;
                height: 400px;
                background-image: url('img_flowers.jpg');
                background-repeat: no-repeat;
                background-size: contain;
            }
            body{
                overflow-x:hidden;
            }

        </style>

    </head>
    <body>

        <?php require 'navbar2.php'; ?>
        <div class="row">
            <div id="insert_post" class="col-sm-12 mt-4"> 
                <center>
                    <form action="index.php?id=<?php echo $u_id; ?>" method="post" id ="form" enctype="multiport/form-data" style="margin-left:10px; margin-right:10px;">
                        <textarea class="form-control" id="content" rows="2" width="500px" name="content" 
                        placeholder="What's in your mind?"></textarea><br>
                        <label class="btn-sm btn-success" id="upload_image_button">
                        <input type="file" name="upload_image" size="30">
                        </label> 
                        <button id="btn-post" class="btn-sm btn-success" name="sub">Post</button>
                    </form>
                    <?php  insertport(); ?>
                </center>


        </div>



        <?php require 'footer.php'; ?>


    </body>
</html>

