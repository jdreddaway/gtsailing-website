<div id="fb-root"></div>
<script>
	function redirect(loginEvent) {
		<?php 
			if (isset($_GET['prev'])) {
				$url = $_GET['prev'];
			} else {
				$url = "/";
			}
		?>

		window.location.replace("<?php echo $url; ?>");
	}

	document.addEventListener("login_success", redirect);
</script>
<div id="status">
</div>
<div id="big-login" class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="true" data-auto-logout-link="true"></div>