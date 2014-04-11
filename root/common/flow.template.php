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
	<link rel="stylesheet" href="/common/flow.css" />
	<link rel="stylesheet" href="<?php print("/$pageName/$pageName.css");?>" />
	<script type="text/javascript" src="/common/client-scripts.js"></script>
</head>
<body>
	<?php requireOnce("/$pageName/$pageName.content.php"); ?>
	
	<script type="text/javascript">
		setUpScrollNav();
	</script>
</body>
</html>