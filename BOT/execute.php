<?php
	include_once 'vars.php';
	include_once 'telegram.php';
	include_once 'vt.php';

	$threads = getThreads();

	foreach ($threads as $thread) {
		echo sendMessage($thread);
	}
?>