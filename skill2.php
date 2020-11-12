<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "lunarfight");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * from login order by id desc LIMIT 1";
$accid = "0";
$roomid = "0";
$a;
$b;
$bossattack;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $accid = $row['accid'];
            $roomid = $row['roomid'];
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$account = "SELECT * from account where id = '$accid'";
if($result = mysqli_query($link, $account)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $username = $row['username'];
            $attack = $row['attack'];
            $health = $row['health'];
            $hero = $row['hero'];
            $rank = $row['rank'];
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$room = "SELECT * from room where id = '$roomid'";
if($result = mysqli_query($link, $room)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $bossattack = $row['attack'];
            $bossname = $row['boss'];
            $bosshealth = $row['health'];
            $id = $row['id'];
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if($hero == "ichigo")
{
    
    if($bossname == "madara")
    {
        if($health < 50)
        {
            $damagepassive = $attack * 0.5;
            $attack += $damagepassive;
            echo "Ichigo passive activated, ichigo attack increase 50%";
            echo "<br><br>";
        }
        $herodamage = $attack * 2.5;
        $b = $bosshealth - $herodamage;
        $attack2 = "UPDATE room SET health='$b' WHERE id='$roomid'";
        $bossrand = rand(1, 4);
        if (mysqli_query($link, $attack2))
                        {
                            echo "ICHIGO using his ultimate BANKAI : TENSA ZANGETSU dealt " . $herodamage . " Damage to Madara";
                            echo "<br>";
                            $passiverand = rand(1, 10);
                                if($passiverand == 1)
                                {
                                    $bossdamage = $bossattack * 0.5;
                                    $a = $health - $bossdamage;
                                    $passive = "UPDATE account SET health='$a' WHERE id='$accid'";
                                                         if (mysqli_query($link, $passive))
                                                        {
                                                        echo "<br>";
                                                            echo "Your attack has been COUNTERED by MADARA, dealt " .$bossdamage . " Damage to Ichigo";
                                                        echo "<br>";
                                                        }
                                }
                            if($bossrand == 1)
                            {
                                $bossdamage = $bossattack * 3;
                                $a = $health - $bossdamage;
                                $attack1 = "UPDATE account SET health='$a' WHERE id='$accid'";
                                 if (mysqli_query($link, $attack1))
                                {
                                echo "<br>";
                                    echo "MADARA using his ultimate SUSANOO, dealt " .$bossdamage . " Damage to Ichigo";
                                echo "<br>";
                                }
                            }
                            else
                            {
                               $bossdamage = $bossattack * 1.8;
                                $a = $health - $bossdamage;
                                $attack1 = "UPDATE account SET health='$a' WHERE id='$accid'";
                                 if (mysqli_query($link, $attack1))
                                {
                                echo "<br>";
                                    echo "MADARA using his basic attack, dealt " .$bossdamage . " Damage to Ichigo";
                                echo "<br><br>";
                                } 
                            }
                        }
    }
    else
    {
        echo "bukan madara juga";
    }
}
else
{
    echo "bukan ichigo";
}

if($a<1 && $b<1)
{
    echo "DRAW!";
    $refreshed = "UPDATE room SET health='70' WHERE id='$roomid'";
    if (mysqli_query($link, $refreshed))
    {
      echo "";
    }
    $refreshed1 = "UPDATE account SET health='100' WHERE id='$accid'";
        if (mysqli_query($link, $refreshed1))
        {
          echo "<br> Health Refreshed <br>";
        }
    $a = 0;
    $b = 0;
}
else
{
    

if($b <1)
{
    echo "YOU WIN!";
    $refreshed = "UPDATE room SET health='70' WHERE id='$roomid'";
    if (mysqli_query($link, $refreshed))
    {
      echo "";
    }
    $refreshed1 = "UPDATE account SET health='100' WHERE id='$accid'";
        if (mysqli_query($link, $refreshed1))
        {
          echo "<br> Health Refreshed <br><br>";
        }
    $rankpoint = $rank + 10;
    $ranking = "UPDATE account SET rank='$rankpoint' WHERE id='$accid'";
    if (mysqli_query($link, $ranking))
        {
          echo " Rank Point +10";
        }
    $b = 0;
}
else if($a <1)
{
    echo "YOU LOSE!";
    $refreshed = "UPDATE room SET health='70' WHERE id='$roomid'";
    if (mysqli_query($link, $refreshed))
    {
        $refreshed1 = "UPDATE account SET health='100' WHERE id='$accid'";
        if (mysqli_query($link, $refreshed1))
        {
          echo "<br> Health Refreshed <br>";
        }
      echo "";
    }
    $refreshed = "UPDATE room SET health='70' WHERE id='$roomid'";
    if (mysqli_query($link, $refreshed))
    {
        $refreshed1 = "UPDATE account SET health='100' WHERE id='$accid'";
        if (mysqli_query($link, $refreshed1))
        {
          echo "<br> Health Refreshed <br>";
        }
      echo "";
    }
    $a = 0;
}

}
echo "<br>";
echo "Hello, " .$username;
echo "<br>";
echo "Rank Points : " .$rank;
echo "<br>";
echo "Hero : " .$hero;
echo "<br>";
echo "Health : " .$a;
echo "<br>";
echo "Attack : " .$attack;
echo "<br><br>";
echo "Room ID : " .$id;
echo "<br>";
echo "Boss : " .$bossname;
echo "<br>";
echo "Health : " .$b;
echo "<br>";
echo "Attack : " .$bossattack;
// Close connection
mysqli_close($link);
?>