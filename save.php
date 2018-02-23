<?php
	$filename = $_POST['filename'];
	$filetext = $_POST['filetext'];

	try{
		$file = fopen($filename, "w"); 
		if($file!=Null)
		{
			fwrite($file, $filetext);
			fclose($file);
		}
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
		echo 'error';
	}

?>
