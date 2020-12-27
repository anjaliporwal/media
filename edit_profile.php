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
          .container .btn {
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
                        <td><input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];}?>" required></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>" required></td>

                        <td> <?php ?> </td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>
                          <div class="form-group">
                            <input type="radio"  id="male" name="gender" value="male">&nbsp Male &nbsp
                            <input type="radio"  id="female" name="gender" value="female">&nbsp Female
                          </div> 
                        </td>
                      </tr>
                      <tr>
                        <td>Date of birth</td>
                        <td><input type="date" class="form-control" id="dob" name="dob" value="<?php if(isset($_SESSION['dob'])){ echo $_SESSION['dob'];}?>" required></td>

                      </tr>
                      <tr>
                        <td>Bio</td>
                        <td><input type="text" class="form-control" id="bio" name="bio" value="<?php if(isset($_SESSION['bio'])){ echo $_SESSION['bio'];}?>"></td>
                      </tr>
                  </tbody>
                </table>
              </p>
              <input type="submit" id="save" class="btn btn-primary btn-sm" value="Save" name="save">
            </div>
          </div>
        </div>

        <?php require 'footer.php'; ?>

    </body>
</html>