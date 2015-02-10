<?php
	$DEBUG = true;

	function requireOnce($path) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes' . $path);
	}
	
	function underConstruction() {
		global $DEBUG;
		
		if (!$DEBUG) {
			header("HTTP/1.1 307 Temporary Redirect");
			header('Location: /construction.php');
		}
	}
?>