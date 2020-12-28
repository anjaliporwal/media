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
          #profile-img{
            position:absolute;
            top:150px;
            left:200px;
          }
          #update_profile{
            position:relative;
            top:100px;
            cursor:pointer;
            left:93px;
            transform:translate(-50%,-50%);
          }
          #button_profile{
            position:absolute;
            top:115%;
            left:50%;
            cursor:pointer;
            transform:translate(-50%,-50%);

          }
        </style>
    </head>
    <body>
        <?php require 'navbar2.php'; ?>
        <div class="card-group d-flex justify-content-center">
          <div class="card-md-6">
              <img class="card-img-top" src="images/<?php echo $cover;?>" alt='cover image' width="400px" height="320px">
              <form action='profile.php?id=<?php echo $u_id; ?>' method='post' enctype='multipart/form-data'>
                <ul class='nav-pull-left' style="position:absolute;list-style-type:none; left:900px;">
                  <li class="dropdown"> 
                  <button class="dropdown-toggle btn btn-default" data-toggle='dropdown'> Change cover </button>
                  <div class="dropdown-menu" style="text-align:center;">
                  <input type="file" class="btn-sm btn-dark" name="user_cover" value="Select cover"/><br><br>
                  <input type="submit" value="Update" class="btn-sm btn-dark" name="user_cover"/></div>
                  </li>
                </ul>
              </form>
                <?php
                  if(isset($_POST['submit'])){
                    $user_cover=$_FILES['user_cover']['name'];
                    $image_tmp =$_FILES['user_cover']['tmp_name'];
                    $random_num= rand(1,100);
                    if($user_cover==''){
                      echo "<script> alert('Please Select Cover image');</script>";
                      echo "<script> window.open('profile.php?id=$u_id','_self');</script>";
                      exit();
                    }
                    else{
                      move_uploaded_file($image_tmp,"images/$user_cover.$random_num");
                      $update = "UPDATE users set user_cover='$user_cover.$random_num' where email='$email'";

                      $run = mysqli_query($conn,$update);
                      if($run){
                        echo "<script> alert('Your Cover image updated.');</script>";
                        echo "<script> window.open('profile.php?id=$u_id','_self');</script>";
                      }
                    }

                  }

                ?>
              <div id='profile-img'>
                <img src='images/<?php echo $profile_pic;?>' alt='profile' class='img rounded-circle' width='180px' height='185px'> 
                <form action='profile.php?id=$u_id' method='post' enctype='multipart/form-data'>
                  <ul class='nav-pull-left' style="position:absolute;list-style-type:none;">
                    <li class="dropdown"> 
                    <button class="dropdown-toggle btn btn-default" data-toggle='dropdown'> Edit </button>
                    <div class="dropdown-menu" style="text-align:center;">
                    <input type="file" class="btn-sm btn-dark" name="user_profile" value="Select profile"/><br><br>
                    <input type="submit" value="Update profile" class="btn-sm btn-dark" name="user_profile"/></div>
                    </li>
                  </ul>
                </form>
              </div>
              <?php
                  if(isset($_POST['submit'])){
                    $user_profile=$_FILES['user_profile']['name'];
                    $image_tmp =$_FILES['user_profile']['tmp_name'];
                    $random_num= rand(1,100);
                    if($user_profile==''){
                      echo "<script> alert('Please Select Profile image');</script>";
                      echo "<script> window.open('profile.php?id=$u_id','_self');</script>";
                      exit();
                    }
                    else{
                      move_uploaded_file($image_tmp,"images/$user_profile.$random_num");
                      $update = "UPDATE users set user_profile='$user_profile.$random_num' where email='$email'";

                      $run = mysqli_query($conn,$update);
                      if($run){
                        echo "<script> alert('Your Cover image updated.');</script>";
                        echo "<script> window.open('profile.php?id=$u_id','_self');</script>";
                      }
                    }

                  }

                ?>
            <div class="card-body">
              <h5 class="card-title"><?php $_SESSION['username']; ?></h5>
              <p class="col-sm-3 card-text">
                <table class="table table-hover">
                  <tbody>
                      <tr>
                        <td>Name</td>
                        <td> <?php echo $name;?> </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td> <?php echo $email;?> </td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $gender;?></td>
                      </tr>
                      <tr>
                        <td>Date of birth</td>
                        <td><?php echo $birthday;?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td><?php echo $status;?></td>
                      </tr>
                      <tr>
                        <td>Bio</td>
                        <td><?php echo $bio;?></td>
                      </tr>

                  </tbody>
                </table>

                <div> </div>
              </p><br><br><br>
            </div>
          </div>
        </div>

        <?php require 'footer.php'; ?>
    </body>
</html>

