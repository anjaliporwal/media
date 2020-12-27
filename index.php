<?php
    session_start();

    include 'connection.php';
    include 'functions.php';

    $user_data = check_login($conn);
    $_SESSION['username']= $user_data['username'];
    $_SESSION['email']= $user_data['email'];

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

        </style>

    </head>
    <body>

        <?php require 'navbar2.php'; ?>
        <div class="container col-sm-12">
            <img id="profile" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-cEUv68-t9eBR4wZirhUwHV7j8U9FTEWuKQ&usqp=CAU" class="img-fluid" alt="Responsive image">
        </div>



        <?php require 'footer.php'; ?>


    </body>
</html>

