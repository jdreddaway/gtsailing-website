<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "membership";
	static $title = "Membership";
	
	requireOnce("/common/flow.template.php");
?>