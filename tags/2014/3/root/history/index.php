<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "history";
	static $title = "History";
	
	requireOnce("/common/flow.template.php");
?>