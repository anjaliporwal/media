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
        <title>mediapro.in </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
          .card{
            width:400px;
          }
          .container .btn{
            position: absolute;
            top: 65%;
            left: 85%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
          }
          #save{
            position: absolute;
            left: 85%;
            border-radius: 5px;
            text-align: center;
          }
        </style>
    </head>
    <body>
        <?php require 'navbar2.php'; ?>
        <div class="card-group-md-4 d-flex justify-content-center">
          <div class="card">
            <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLJpyedq86DMkWTEsrf18L0njU8PuqOGDlFA&usqp=CAU" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php $_SESSION['username']; ?></h5>
              <p class="card-text">
                <table class="table table-hover">
                  <tbody>
                      <tr>
                        <td>Name:</td>
                        <td> <?php echo $_SESSION['username'];?> </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td> <?php echo $user_data['email'];?> </td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $_SESSION['gender'];?></td>
                      </tr>
                      <tr>
                        <td>Date of birth</td>
                        <td><?php echo $_SESSION['dob'];?></td>
                      </tr>
                      <tr>
                        <td>Mobile Number</td>
                        <td><?php echo $_SESSION['mobno'];?></td>
                      </tr>
                      <tr>
                        <td>Bio</td>
                        <td><?php echo $_SESSION['bio'];?></td>
                      </tr>
                  </tbody>
                </table>
              </p><br><br><br>
            </div>
          </div>
        </div>

        <?php require 'footer.php'; ?>
    </body>
</html>