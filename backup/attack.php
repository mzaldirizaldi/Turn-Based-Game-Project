<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "games");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$a=$_GET["player1"];
// Attempt create table query execution
$attack = "SELECT id, name, health, attack, boss, bosshealth, bossattack FROM battle WHERE id = '$a'";
$result = $link->query($attack);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  { 
    $chardamage = $row["attack"];
    $bossdamage = $row["bossattack"];
    $b = $row["bosshealth"] - $chardamage;
    $c = $row["health"] - $bossdamage;
    $attack = "UPDATE battle SET bosshealth='$b' WHERE id='$a'";
    $bossattack = "UPDATE battle SET health='$c' WHERE id='$a'";
    
    echo " - Name: " . $row["name"]. " Health: " . $c. "<br>";
    echo " - Boss: " . $row["boss"]. " Health: " . $b. "<br>";
      
        if($b > 0)
        {
            if($c > 0)
            {
                $crit = rand(1, 5);
                echo $crit;
                if($crit == 1)
                {
                    $temp = $chardamage;
                    $chardamage += $chardamage * (20/100);
                    echo "Critical 20% <br>";
                    if (mysqli_query($link, $attack))
                    {
                        echo "Player attack Success ". $row["boss"]. " health -". $chardamage. "<br>";
                    }
                    $chardamage = $temp;
                }
                else
                {
                    if (mysqli_query($link, $attack))
                    {
                        echo "Player attack Success ". $row["boss"]. " health -". $chardamage. "<br>";
                    }
                }

                if (mysqli_query($link, $bossattack))
                {
                    echo "Boss attack Success ". $row["name"]. " health -".  $bossdamage. "<br>";
                }
            }
            else
            {
                echo "You Lose";
            }
        }
        else
        {
            echo "Boss has been taken down";
        }
    }
      
      
      
   
} 
else 
{
  echo "0 results";
}
/*if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["health2"] < -1){
      echo  "You Win";
    }
      else{
    echo " - Name: " . $row["name1"]. " Health: " . $row["health1"]. "<br>";
    echo " - Name: " . $row["name2"]. " Health: " . $row["health2"]. "<br>";
      }
  }
} else {
  echo "0 results";
}*/

// Close connection
mysqli_close($link);
?>