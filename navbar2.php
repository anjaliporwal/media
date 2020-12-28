
<!DOCTYPE html>
<html>
    <head><title>mediapro.in  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
        .navbar{
            background-color: skyblue;
        }
        .navbar-toggler-icon{
            color:blue;
        }
        </style>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfBsBPx5sMy4KpYntg40RG_XMydj9mRySs1A&usqp=CAU" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
                <?php echo $_SESSION['username']; ?>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="friends.php">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php">Notifications</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="update.php">Update password</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET" action="results.php">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Search</button>
                </form>
            </div>
        </nav>
    </body>
</html>