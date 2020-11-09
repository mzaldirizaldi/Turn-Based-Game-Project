<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "games");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$char1 = "INSERT INTO characters (name, health, attack) VALUES ('Rizal', 100, 20)";
$char2 = "INSERT INTO characters (name, health, attack) VALUES ('Aufa', 200, 30)";
if(mysqli_query($link, $char1)){
    echo $char1;
    echo " Data inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $char2)){
    echo $char2;
    echo " Data inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>