<?php
	function requireOnce($path) {
		if ($path[0] == '/') {
			require_once($_SERVER['DOCUMENT_ROOT'] . $path);
		} else {
			require_once($path);
		}
	}
	
	function underConstruction() {
		http_response_code(307);
		header('Location: /construction.php');
	}
?>