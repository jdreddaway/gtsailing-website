<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "history";
	static $title = "History";
	
	requireOnce("/common/flow.template.php");
?>