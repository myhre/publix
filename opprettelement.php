<?php

session_start();
require_once 'config.inc';

$side = $_POST['eside'];
$overskrift = $_POST['enavn'];
$innhold = $_POST['innhold'];

$sql = "INSERT INTO elementer (side, overskrift, innhold) VALUES('$side', '$overskrift', '$innhold')";
if (!mysql_query($sql)) {                          //Hvis dataene ikke blir lagt inn i databasen
    die('Error: ' . mysql_error());
} else {
    echo 'ok';
}
?>