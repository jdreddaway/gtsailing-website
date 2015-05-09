<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

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
	<link rel="icon" type="image/x-icon" href="/images/favicon.png" />
	
	<link rel="stylesheet" href="/common/article.css" />
	<link rel="stylesheet" href="<?php print("/$path/$pageName.css");?>" />
	<link rel="stylesheet" href="/common/header.css" />
</head>
<body>
	<?php requireOnce("/common/login-header.php"); ?>
	<div id="login_placeholder"></div>
	
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
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-52711404-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>