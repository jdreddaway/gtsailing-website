<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "sailing";
	static $title = "Sailing";
	
	requireOnce("/common/flow.template.php");
?>