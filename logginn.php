<?php
require_once 'config.inc';

$myusername= $_POST['brukernavn'];
$mypassword= md5($_POST['passord']);
                                                //Henter brukerinfo fra databasen
$sql = "SELECT * FROM brukere WHERE brukernavn = '$myusername' AND passord = '$mypassword'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


if(mysql_num_rows($result) > 0){                //Hvis brukernavn med tilsvarende passord finnes
    if(strcmp($row['passord'],$mypassword) == 0) {
        echo "ok";                              //Innlogging ok
        session_start();
        $_SESSION['uid'] = $row['brukerid'];    //Setter sessionvariable
        $_SESSION['brukernavn'] = $row['brukernavn'];
    }
    else                                        //Hvis passord er feil
        echo "feil";                            //Innlogging feilet
}
else                                            //Hvis brukernavn / passord er feil
    echo "feil";                                //Innlogging feilet


?>