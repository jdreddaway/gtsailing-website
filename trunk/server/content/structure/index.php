<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

	underConstruction();
	
	static $pageName = "structure";
	static $title = "Structure";
	
	requireOnce("/common/flow.template.php");
?>