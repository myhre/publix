<?php

session_start();
require_once 'config.inc';

if (isset($_SESSION['uid'])) { //Sjekker om du er logget inn
    $brukerid = $_SESSION['uid'];
    $sql = "SELECT * FROM sider WHERE brukerid = '$brukerid' ORDER BY sidenavn";
    $result = mysql_query($sql);
    echo "<br/>";
    while ($row = mysql_fetch_array($result)) { //Skriver ut dine sider
        echo "<a href='#' class='sider'>$row[sidenavn]</a> <input id='$row[sidenavn]' class='addElement' type='button' value='Lag elementer til denne siden' /><br />";
    }
}
else
    echo "Du m&aring; v&aelig;re logget inn for &aring; se dine sider.";
?>
