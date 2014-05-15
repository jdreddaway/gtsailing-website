<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");

	/* this expects that certain variables have already been set: */
	global $title;
	global $pageName;
?>

<!DOCTYPE html>

<html>
<head>
	<title>GT Sailing - <?php print($title); ?></title>
	<link rel="stylesheet" href="/common/old.css" />
	<link rel="stylesheet" href="<?php print("/$pageName/$pageName.css");?>" />
	<script type="text/javascript" src="/common/client-scripts.js"></script>
</head>
<body>
	<div id="page">
		<div id="header">
			<img src="/images/logo.jpg" />
			<img id="banner" src="/images/banner.jpg" />
		</div>
		<ul id="navbar">
			<li><a href="/">Home</a></li>
			<li><a href="/news.php">News</a></li>
			<li><a href="/club_info.php">Club Info</a></li>
			<li><a href="/fleet.php">Fleet</a></li>
			<li><a href="/calendar.php">Calendar</a></li>
			<li><a href="/instruction.php">Instruction</a></li>
			<li><a href="/competition.php">Competition</a></li>
			<li><a href="/contact/">Contact Us</a></li>
		</ul>
		<div id="content">
			<?php requireOnce("/$pageName/$pageName.content.php"); ?>
		</div>
	</div>
</body>
</html>