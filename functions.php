<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname="media";
$conn = mysqli_connect($servername, $username, $password , $dbname);

function check_login($conn){

    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query= "SELECT * FROM users where email='$email' limit 1";

        $result= mysqli_query($conn ,$query);
        if($result && mysqli_num_rows($result)>0){
            $user_data= mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}

function insertpost(){
    if(isset($_POST['sub'])){
        global $conn;
        global $u_id;

        $content= $_POST['content'];

        $uploadfile = $_FILES['upload_image']['name'];
        $image_tmp = $_FILES['upload_image']['tmp_name'];

        $random_number=rand(1,100);

        echo $content;
        echo $uploadfile;

        if(strlen($content)>250){
            echo "<script> alert('Please use 250 or less than 250 words.');</script>";
            echo "<script> window.open('index.php','_self');</script>";
        }
        else
        {
            if(!empty($uploadfile) && !empty($content)){
                move_uploaded_file($image_tmp, "images/$uploadfile.$random_number");
                $insert= "INSERT INTO post (u_id, post_content, upload_image,post_date)
                values ('$u_id','$content','$uploadfile.$random_number', NOW())";

                
                $run= mysqli_query($conn,$insert);
                if($run){
                    echo "<script> alert('Your post updated a moment ago!');</script>";
                    echo "<script> window.open('index.php','_self');</script>";

                    $update= "UPDATE users set posts='yes' where id='$u_id'";
                    $run_update= mysqli_query($conn,$update);
                }
                exit();
            }
            else
            {
                if($uploadfile=='' && $content==''){
                    echo "<script> alert('Error occured while uploading!');</script>";
                    echo "<script> window.open('index.php','_self');</script>";
                }
                else
                {
                    if($content==''){
                        echo $random_number;
                        move_uploaded_file($image_tmp,"images/$uploadfile.$random_number");
                        $insert= "INSERT INTO post (u_id, post_content, upload_image,post_date)
                        values ('$u_id','no','$uploadfile.$random_number', NOW())";

                        $run= mysqli_query($conn,$insert);
                        if($run){
                            echo "<script> alert('Your post updated a moment ago!');</script>";
                            echo "<script> window.open('index.php','_self');</script>";

                            $update= "UPDATE users set posts='yes' where id='$u_id'";
                            $run_update= mysqli_query($conn,$update);
                        }
                    }else{
                        $insert= "INSERT into post (u_id, post_content,post_date)
                        values ('$u_id','no', NOW())";

                        $run= mysqli_query($conn,$insert);
                        if($run){
                            echo "<script> alert('Your post updated a moment ago!');</script>";
                            echo "<script> window.open('index.php','_self');</script>";

                            $update= "UPDATE users set posts='yes' where id='$u_id'";
                            $run_update= mysqli_query($conn,$update);
                        }

                    }
                }
            }
        }
    }
}


// function get_posts(){
//     global $conn;
//     $per_page=5;
//     if(isset($_GET['page'])){
//         $page = $_GET['page'];
//     }else{
//         $page=1;
//     }
//     $start_form = ($page-1)* $per_page;
//     $get_posts= "SELECT * from post order by 1 DESC LIMIT $start_form,$per_page";
//     $run_posts= mysqli_query($conn,$get_posts);
     
//     while($row_posts = mysqli_fetch_array($run_posts)){

//     }
// }
?>

