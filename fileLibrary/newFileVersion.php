<?php
/**
 * Script used create a new version of an existing file.
 * The existing file will get a link to the new file in the newVersion field
 */

// Start the session handling system
session_start ();

// Connect to the database
require_once ("../config.inc");

// No need to try to log in if no username/password are set
if (!isset ($_SESSION['brukernavn']))    
	die ('Ikke logget på som en bruker');

$sql = 'UPDATE documents SET newVersion=? WHERE id=? AND owner=?';
$sth = $db->prepare ($sql);
	
$sth->execute (array ($_POST['newId'], $_POST['existing'], $_SESSION['brukernavn']));
?>