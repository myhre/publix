<?php

session_start();
require_once 'config.inc';

$brukernavn =$_SESSION['brukernavn'];

//Gjør en sjekk på hvilke felter som er fylt ut, og oppdaterer kun disse

if (isset($_POST['passord']) && !empty($_POST['passord'])) {
    $passord = md5($_POST['passord']);
    $sql = "UPDATE brukere
    SET passord ='$passord'
    WHERE brukernavn = '$brukernavn'";

     if (!mysql_query($sql)) {
        die('Error: ' . mysql_error());
    } 
    
}

if (isset($_POST['fornavn']) && !empty($_POST['fornavn'])) {
    $sql2 = "UPDATE brukere
    SET fornavn ='$_POST[fornavn]'
    WHERE brukernavn = '$brukernavn'";

    if (!mysql_query($sql2)) {
        die('Error: ' . mysql_error());
    } 
}

if (isset($_POST['etternavn']) && !empty($_POST['etternavn'])) {
    $sql3 = "UPDATE brukere
    SET etternavn ='$_POST[etternavn]'
    WHERE brukernavn = '$brukernavn'";

    if (!mysql_query($sql3)) {
        die('Error: ' . mysql_error());
    } 
}

if (isset($_POST['mail']) && !empty($_POST['mail'])) {
    $sql4 = "UPDATE brukere
    SET mail ='$_POST[mail]'
    WHERE brukernavn = '$brukernavn'";

    if (!mysql_query($sql4)) {
        die('Error: ' . mysql_error());
    } 
}



if (isset($_POST['telefon']) && !empty($_POST['telefon'])) {
    
    $sql5 = "UPDATE brukere
    SET telefon ='$_POST[telefon]'
    WHERE brukernavn = '$brukernavn'";

    if (!mysql_query($sql5)) {
        die('Error: ' . mysql_error());
    } 
}
echo "ok";
?>