<?php

session_start();
require_once'config.inc';

if (isset($_SESSION['uid']))
    $sql = "SELECT * FROM brukere WHERE brukerid != '$_SESSION[uid]' ORDER BY brukernavn";
else
    $sql = "SELECT * FROM brukere ORDER BY brukernavn";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) { //Lister opp alle brukerne i brukermenyen på siden
    echo "<a href='#' class='brukere'>$row[brukernavn]</a><br/>";
    $sql2 = "SELECT * FROM sider WHERE brukerid = '$row[brukerid]' AND privat = '0' ORDER BY sidenavn"; //Velger alle sidene per bruker som ikke er private
    $result2 = mysql_query($sql2);
    echo "<ul id='$row[brukernavn]'>";
    while ($row2 = mysql_fetch_array($result2)) { //Lister opp sidene i liste-elementer
        echo "<li><a href='#' class='sider'>$row2[sidenavn]</a></li>";
    }
    echo "</ul>";
}
?>