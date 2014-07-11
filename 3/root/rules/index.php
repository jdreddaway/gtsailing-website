<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "rules";
	static $title = "Rules";
	
	requireOnce("/common/flow.template.php");
?>