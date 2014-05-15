<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");

	/* this expects that certain variables have already been set: */
	global $title;
	global $path; // the location of all the page's files; do not include '/' at either end
	global $pageName;
?>

<!DOCTYPE html>

<html>
<head>
	<title>GT Sailing - <?php print($title); ?></title>
	
	<meta charset="UTF-8" />
	
	<link rel="stylesheet" href="/common/article.css" />
	<link rel="stylesheet" href="<?php print("/$path/$pageName.css");?>" />
</head>
<body>
	<div id="content-wrapper">
		<div id="content">
			<?php requireOnce("/$path/$pageName.content.php"); ?>
		</div>
	</div>
	<div id="footer-placeholder">
		<!-- this is to reserve space for the footer -->
	</div>
	<div id="footer">
		<?php requireOnce("/common/footer.php"); ?>
	</div>
</body>