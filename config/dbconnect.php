<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="charity";

    $conn=mysqli_connect($server,$user,$password,$db);

    if(!$conn){
        die("connection Failed:".mysqli_connect_errno());
    }
?>