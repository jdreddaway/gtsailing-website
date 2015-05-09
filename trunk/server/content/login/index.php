<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");
	
	underConstruction();
	
	static $pageName = "login";
	static $path = "login";
	static $title = "Login";
	
	requireOnce("/common/article.template.php");
?>