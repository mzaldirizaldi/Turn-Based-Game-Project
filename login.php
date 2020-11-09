<?php
$link = mysqli_connect("localhost", "root", "", "lunarfight");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$a=$_GET["a"];
$b=$_GET["b"];

$check_login = "select email from account where email='$a' or username='$a' and password='$b' ";
$run_login = mysqli_query($link,$check_login);
$check = mysqli_num_rows($run_login);
if($check == 1){
        
   echo 'Login Success';
}
else{
    echo 'Password or Username Incorrect';
}

// Close connection
mysqli_close($link);


?>