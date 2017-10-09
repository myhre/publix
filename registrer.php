<?php

require_once 'config.inc';

if (isset($_POST['bnavn']) && !empty($_POST['bnavn'])             //Hvis alle feltene er fylt ut
        && isset($_POST['pord']) && !empty($_POST['pord'])
        && isset($_POST['fornavn']) && !empty($_POST['fornavn'])
        && isset($_POST['etternavn']) && !empty($_POST['etternavn'])
        && isset($_POST['mail']) && !empty($_POST['mail'])
        && isset($_POST['telefon']) && !empty($_POST['telefon'])) {


    $passord = md5($_POST['pord']);
    //Legger til brukerinfo i databasen
    $sql = "INSERT INTO brukere (brukernavn, passord, fornavn, etternavn, mail, telefon) 
    VALUES ('$_POST[bnavn]', '$passord', '$_POST[fornavn]', '$_POST[etternavn]', '$_POST[mail]', '$_POST[telefon]')";

    if (!mysql_query($sql)) {                                       //Hvis dataene ikke blir lagt inn i databasen
        die('feil');                                 
    } else {                                                            //Hvis dataene blir lagt inn i databasen
        echo "ok";                                                  //Registrering ok
        $myusername = $_POST['bnavn'];
        $mypassword = $_POST['pord'];                                   //Henter brukerinfo fra databasen
        $sql2 = "SELECT * FROM brukere WHERE brukernavn = '$myusername' AND passord = '$mypassword'";
        $result = mysql_query($sql2);
        $row = mysql_fetch_array($result);
    }
}
else{
    echo 'tomt';
}
?>