<?php
	$filename = $_POST['filename'];
	$run_cmd = './'.explode('.',$filename)[0].'.out';
	$out = shell_exec($run_cmd); 
	echo $out
?>
