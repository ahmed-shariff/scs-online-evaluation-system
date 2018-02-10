<?php
	$filename = $_POST['filename'];
	$filetext = $_POST['filetext'];

	$file = fopen($filename, "w") or die('IOError');
	fwrite($file, $filetext);

	fclose($file);
?>