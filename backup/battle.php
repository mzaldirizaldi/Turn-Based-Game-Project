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
$boss = "SELECT name, health, attack FROM boss WHERE id = '1'";
$char = "SELECT name, health, attack FROM characters WHERE name = '$a'";
$battle = "SELECT id, name, boss FROM battle";
$result = $link->query($boss);
$result1 = $link->query($char);
$result2 = $link->query($battle);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc() and $row1 = $result1->fetch_assoc()) 
  { 
    $bossname = $row["name"];
    $bossattack = $row["attack"];
    $bosshealth = $row["health"];
    $name = $row1["name"];
    $attack = $row1["attack"];
    $health = $row1["health"];
    $bossinsert = "INSERT INTO battle (boss, bossattack, bosshealth, name, health, attack) VALUES ('$bossname', '$bossattack', '$bosshealth', '$name', '$health', '$attack')";
    if(mysqli_query($link, $bossinsert))
    {
        echo "Boss has been selected";
    } 
      else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
      
  }
} 
else 
{
  echo "0 results";
}
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo "room: " . $row["id"]. " - Name: " . $row["name"]. " Boss: " . $row["boss"]. "<br>";
  }
} else {
  echo "0 results";
}
// Close connection
mysqli_close($link);
?>