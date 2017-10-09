<?php
session_start();

if(isset($_SESSION['uid'])) {
    $bruker = $_SESSION['uid'];
?>

    <form method="post" id="lagsidefelt">
        Sidenavn (Dette blir overskrift p&aring; siden din): <input id='sidenavn' type='text' name='sidenavn'/>
        
        <input type='radio' name='status' value='0' checked/>Offentlig<br/>
        <input type='radio' name='status' value='1' />Privat<br/>
        
        <button type='submit' name='lagsidebtn'>Lag side</button>
    </form>
<?php
}
else
    echo "Du m&aring; v&aelig;re logget inn for &aring; opprette ny side.";

