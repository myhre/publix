<?php

session_start();
require_once 'config.inc';

$navn = $_POST['sidenavn'];
$bruker = $_SESSION['uid'];
$privat = $_POST['status'];

$sql = "INSERT INTO sider (sidenavn, brukerid, privat) VALUES('$navn', '$bruker', '$privat')";
if (!mysql_query($sql)) {                          //Hvis dataene ikke blir lagt inn i databasen
    die('Error: ' . mysql_error());
} else {
    echo 'ok';
}
?>