<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");
	
	static $pageName = "test";
	static $path = "articles/test";
	static $title = "Test";
	
	requireOnce("/common/article.template.php");
?>