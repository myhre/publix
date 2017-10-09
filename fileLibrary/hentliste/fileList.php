<?php
/**
 * This script is called to fill the list of files in the dialog used by tinymce to let the user select
 * images of files for links.
 * Called by the fileList.php script in fileLibrary.
 */

// Start the session handling system
session_start ();

// Return correct content type
header ('Content-type: application/json');

// Connect to the database
require_once ("../../config.inc");

// Only allow this for external users
if (!isset ($_SESSION['brukernavn']))
	die (json_encode(array ('error........')));

if ($_POST['type']=='image') {
	// SQL statement to select all images uploaded by the user
	$sql = 'SELECT id, name, size, DATE_FORMAT(`date`, "%d/%m-%y") as `date`, descr 
	        FROM documents 
			WHERE owner=? AND LEFT(mime, 5)="image" AND newVersion=0
			ORDER BY name';
} else {
	// SQL statement to select all images uploaded by the user
	$sql = 'SELECT id, name, size, DATE_FORMAT(`date`, "%d/%m-%y") as `date`, descr 
	        FROM documents WHERE owner=? AND newVersion=0
			ORDER BY name';
}
$sth = $db->prepare ($sql);
// Send the statement to the database
$sth->execute (array ($_SESSION['brukernavn']));
echo json_encode ($sth->fetchAll());
?>