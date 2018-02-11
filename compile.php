<?php
	$filename = $_POST['filename'];
	$compile_cmd = 'gcc '.$filename.' -o '.explode('.',$filename)[0].'.out';
	echo $compile_cmd;
	$out = shell_exec($compile_cmd.' 2>&1 1> /dev/null'); 
	echo $out
?>
