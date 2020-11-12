<?php
$link = mysqli_connect("localhost", "root", "", "lunarfight");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$hero=$_GET["hero"];
$b=$_GET["b"];
$c=$_GET["c"];
$d=$_GET["d"];

$check_email = "select email from account where email='$b' ";
$run_email = mysqli_query($link,$check_email);
$check_username = "select username from account where username='$c' ";
$run_username = mysqli_query($link,$check_username);
$check = mysqli_num_rows($run_email);
$check1 = mysqli_num_rows($run_username);
$sql = "INSERT INTO account (email, username, password, hero, attack, health, critrate, critdamage, blockrate, block, rank) VALUES ('$b', '$c', '$d', '$hero', '10', '100', '10', '10', '10', '10', '0')";
if($check == 1){
    echo 'Email Already Exist';
    echo "<br>";
}
if($check1 == 1){
    echo 'Username Already Exist';
    echo "<br>";
}
if (mysqli_query($link, $sql)){
    echo "Register Success";
}
else{
    
}

// Close connection
mysqli_close($link);


?>