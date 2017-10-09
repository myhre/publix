<?php

session_start();
require_once 'config.inc';

if(isset($_POST['sidenavn'])){
$sidenavn = $_POST['sidenavn'];

$sql = "SELECT * FROM sider WHERE side = '$sidenavn'";
$result = mysql_query($sql);

$sql2 = "SELECT * FROM elementer WHERE side ='$sidenavn'";
$result = mysql_query($sql2);
if(mysql_num_rows($result) > 0) {
while($row = mysql_fetch_array($result)) { //Så lenge det er elementer, skriv de ut
    echo "<div class='elementer'>";
    echo "<h3>$row[overskrift]</h3>";
    echo $row['innhold']; echo "<br/>";
    echo '</div>';
}
}
else
    echo "Ingen elementer p&aring; denne siden.";
}
?>