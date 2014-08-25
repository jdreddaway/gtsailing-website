<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");

	underConstruction();
	
	static $pageName = "structure";
	static $title = "Structure";
	
	requireOnce("/common/flow.template.php");
?>