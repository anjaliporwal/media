<?php

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname="media";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password , $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        echo "<script type='text/javascript'>console.log('Connected successfully!!!');</script>";
    }

?>
