<?php
$link = mysqli_connect("localhost", "root", "", "lunarfight");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$a=$_GET["a"];
$b=$_GET["b"];

$check_login = "select * from account where username='$a' and password='$b' ";
$run_login = mysqli_query($link,$check_login);
$check = mysqli_num_rows($run_login);
if($check == 1)
{
    if($result = mysqli_query($link, $check_login)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $sql = "INSERT INTO login (username, accid, roomid) VALUES ('$a', '$id', '1')";
                if (mysqli_query($link, $sql)){ 
                echo '1';
                }
            }
            // Free result set
            mysqli_free_result($result);
        }else{
        echo "No records matching your query were found.";
    }
}
}
else{
    echo 'Password or Username Incorrect';
}

// Close connection
mysqli_close($link);


?>