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

	function addFlowBackgroundImage($imageName) {
		print("
			<div class='background'>
				<img src='/images/backgrounds/${imageName}_top.png' />
				<img src='/images/backgrounds/${imageName}_mid.jpg' />
				<img src='/images/backgrounds/${imageName}_bot.png' />
			</div>
		");
	}

	requireOnce("/../vendor/autoload.php");

?>