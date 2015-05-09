<div id="fb-root"></div>
<script>
	var fbInitializedEvent = new Event("fbInitialized");
	fbInitializedEvent.hasOccurred = false;

	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1498857583704986',
			xfbml      : true,
			version    : 'v2.1'
		});
	
		fbInitializedEvent.hasOccurred = true;
		document.dispatchEvent(fbInitializedEvent);
		sayHello();
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	} (document, 'script', 'facebook-jssdk'));

	function sayHello() {
		FB.getLoginStatus(function(statusResponse) {
			var greetingSpan = document.getElementById('greeting');
			
			if (statusResponse.status === 'connected') {
				// Logged into your app and Facebook.
				FB.api('/me', function(meResponse) {
					greetingSpan.innerHTML = "<span>Hello " + meResponse.name + "!</span>";
				});
			} else {
				greetingSpan.innerHTML = "";
			}
		});
	}

</script>
<div id="login_header">
	<div>
		<div id="greeting"></div>
		<div class="fb-login-button" data-max-rows="1" data-size="small" data-show-faces="false" data-auto-logout-link="true" onlogin="sayHello();"></div>
	</div>
</div>
