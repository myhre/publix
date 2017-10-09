<?php
/**
 * Page used to display a list of external users files
 * Also allows for uploading new files/new versions of files.
 */

// Start the session handling system
session_start ();
require_once ("../../config.inc");

// Connect to the database

// Only allow this for external users
if (!isset ($_SESSION['brukernavn']))
	die ('Du m&aring; v&aelig;re logget inn for &aring; laste opp filer.');


// Select information about all the users files

$sql = 'SELECT name, id, size, DATE_FORMAT(`date`, "%d/%m-%y") AS `date`, descr FROM documents WHERE owner = ? AND newVersion=0';
$sth = $db->prepare ($sql);
$sth->execute (array ($_SESSION['brukernavn']));	// Get files for currently logged in user only
$files = $sth->fetchAll();					// Get all files in one go
?><h2>Liste over dine filer</h2>
<table class="filelist">
<thead>
<tr><th>Filnavn</th><th>Størrelse</th><th>Dato</th><th>Beskrivelse</th><th>Slett</th></tr>
</thead>
<tbody>
<?php

foreach ($files as $row) {			// Loop through all files, one at a time
	// Format the file size nicely with MB/KB
	if ($row['size']>1024*1024)		// This file is in the MB range
		$row['size'] = sprintf ("%1.2fMB", $row['size']/(1024*1024));
	else if ($row['size']>1024)		// This file is in the KB range
		$row['size'] = sprintf ("%1.2fKB", $row['size']/1024);
	// Display all files        
        echo "<tr><td>{$row['name']}</td><td>{$row['size']}</td><td>{$row['date']}</td><td> {$row['descr']}</td><td> <input id='{$row['id']}' type='image' src='images/kryssut.png' width='15' height='15' onclick='confirmDelete(id)'/> </td></tr>\n";
}
?>
</tbody>
</table>
<h2>Laste opp nye filer</h2>
<p>Last opp en fil med samme navn som eksisterende for å erstatte en gammel fil med en ny versjon</p>
<!-- The file upload form, use an iframe as the target -->
<form method="post" action="fileLibrary/uploadFile.php" target="fileUploadTarget" enctype="multipart/form-data">
<label for="upload">Velg fil</label><input type="file" name="upload"><br/>
<label for="descr">Beskrivelse</label><input type="text" name="descr" title="Kort beskrivelse av filen"/><br/>
<input type="submit" value="Last opp filen"/>
</form>
<script type="text/javascript">
function fileUploaded (tmp) {	// Get json encoded data, this method get called from a script loaded into the iframe
	data = eval ('('+tmp+')');	// Decode json data
	if (data.error)				// If an error occured
		alert (data.error);		// Show error message
	else if (data.existing) {	// File already exists
		// Should we create a new version or keep both files
		var r = confirm ('Filen eksisterer fra før, trykk OK for å lagre som ny versjon?\n (Cancel/Avbryt for å beholde den gamle filen.)');
		if (r==true) {			// Create a new version of the file
			$.ajax ({	
				url: 'fileLibrary/newFileVersion.php',	// Script to give the new file the old files id, then chain the old file to the new one
				type: 'POST',
				data: {existing: data.existing, newId: data.id},	// Send old and new ids
				success: function () {	// When done, reload the file list
					$('#innhold').load ('fileLibrary/pages/files.php');
				}
			});
		} else {				// Remove the newly uploaded file
			$.ajax ({	
				url: 'fileLibrary/deleteFile.php',	// Script to give the new file the old files id, then chain the old file to the new one
				type: 'POST',
				data: {id: data.id},	// Send id of file to delete
				success: function () {	// When done, reload the file list
					$('#innhold').load ('fileLibrary/pages/files.php');
				}
			});
		}  
	} else						// New file uploaded, reload the file list
		$('#innhold').load ('fileLibrary/pages/files.php');
}
</script>

<!-- Delete a spesific file --> 
<script type="text/javascript">
function confirmDelete(tmp)
{
var r=confirm("Press ok for � slette filen");
if (r==true)
  {
  $.ajax ({	
				url: 'fileLibrary/deleteFile.php',	// Script to delete a file
				type: 'POST',
				data: {id: tmp},	// Send id of file to delete
				success: function () {	// When done, reload the file list
					$('body > section').load ('fileLibrary/pages/files.php');
				}
			});    
  alert("Filen er slettet!");
  $("#innhold").load('fileLibrary/pages/files.php');
  }
}
</script>
<!-- Create an iframe to use as a target for file uploading -->
<iframe name="fileUploadTarget" id="fileUploadTarget" style="height:0px; width: 0px; display: none" src="config.inc"></iframe>