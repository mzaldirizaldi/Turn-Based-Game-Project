<?php
$link = mysqli_connect("localhost", "root", "", "lunarfight");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$login = "SELECT * from account order by rank desc";
$displayresult = $link->query($login);

if ($displayresult->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>RankPoints</th>";
        echo "</tr>";
          while($row = $displayresult->fetch_assoc()) {
            echo "<tr>";
                echo "<td>".$row["username"]. "</td> <td>" .$row["rank"]. "</td>";
            echo "</tr>";
          }
        echo "</table>";
}
// Close connection
mysqli_close($link);


?>