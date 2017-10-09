<?php 
    session_start();
    $bruker = $_SESSION['brukernavn'];
    
    echo "<p> Du er n&aring; logget inn som en <b> $bruker </b></p>";
    
    echo"<input type='button' id='loggutbtn' value='Logg ut'/>";
    echo"<input type='button' id='redigerbtn' value='Rediger brukerinformasjon'/>";
?>