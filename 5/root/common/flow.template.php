<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/common/server-scripts.php");

	/* this expects that certain variables have already been set: */
	global $title;
	global $pageName;
?>

<!DOCTYPE html>

<html>
<head>
	<title><?php print($title); ?></title>
	
	<meta charset="UTF-8" />
	<link rel="icon" type="image/x-icon" href="/images/favicon.png" />
	
	<link rel="stylesheet" href="/common/flow.css" />
	<link rel="stylesheet" href="<?php print("/$pageName/$pageName.css");?>" />
	
	<script type="text/javascript" src="/common/client-scripts.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="/common/jquery.scrollTo.min.js"></script>
</head>
<body>
	<?php requireOnce("/$pageName/$pageName.content.php"); ?>
	
	<script type="text/javascript">
		setUpScrollNav();
	</script>
	
	<div class="dynamic" id="footer">
		<div>
			<?php requireOnce("/common/footer.php"); ?>
		</div>
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
</html>