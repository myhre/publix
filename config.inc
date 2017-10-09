<?php


$hostname = 'mortenmyhre.no.sql';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
$dbname   = 'mortenmyhre_no'; 	// Your database name.
$username = 'mortenmyhre_no';             // Your database username.
$password = 'dEyBJNfY';                 // Your database password. If your database has no password, leave it empty.

// Let's connect to host
$link = mysqli_connect($hostname, $username, $password) or DIE("Connection to host is failed, perhaps the service is down!");
// Select the database
mysqli_select_db($link, $dbname) or DIE("Database name is not available!");

?>
