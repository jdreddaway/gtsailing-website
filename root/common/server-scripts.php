<?php
	function requireOnce($path) {
		if ($path[0] == '/') {
			require_once($_SERVER['DOCUMENT_ROOT'] . $path);
		} else {
			require_once($path);
		}
	}
	
	function underConstruction() {
		header("HTTP/1.1 307 Temporary Redirect");
		header('Location: /construction.php');
	}
?>