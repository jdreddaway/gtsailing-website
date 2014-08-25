<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");
	
	underConstruction();

	static $pageName = "membership";
	static $title = "Membership";
	
	requireOnce("/common/flow.template.php");
?>