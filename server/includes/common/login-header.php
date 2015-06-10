<div id="fb-root"></div>
<script>
	//fbInitializedEvent.hasOccurred = false;
	var fbIsInitialized = false;

	window.fbAsyncInit = function() {
		FB.Event.subscribe("auth.statusChange", onFBStatusChange);

		FB.init({
			appId      : <?php global $appID; print($appID); ?>,
			xfbml      : true,
			version    : 'v2.3',
			status: true
		});
	
		fbIsInitialized = true;
		var fbInitializedEvent = new Event("fbInitialized");
		document.dispatchEvent(fbInitializedEvent);
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	} (document, 'script', 'facebook-jssdk'));

	function logIn(accessToken, fnSuccess, fnFailure) {
		document.addEventListener('login_success', function(e) { fnSuccess(e.user); });

		$.ajax({
			type: 'POST',
			url: '/api/login/',
			data: {accessToken: accessToken},
			success: function(data) {
				var loginSuccessEvent = new CustomEvent("login_success", {'user': data});
				document.dispatchEvent(loginSuccessEvent);
			},
			statusCode: {
				404: fnFailure
			}
		});
	}

	function sayHello() {
		var greetingSpan = document.getElementById('greeting');

		FB.api('/me', function(meResponse) {
			greetingSpan.innerHTML = "<span>Hello " + meResponse.name + "!</span>";
		});
	}

	function sayNeedToRegister() {
		//TODO redirect to register page on failure
		var greetingSpan = document.getElementById('greeting');

		greetingSpan.innerHTML = "<span>Need to register!";
	}

	function onFBStatusChange(statusResponse) {
		console.log(statusResponse);

		if (statusResponse.status === 'connected') {
			// Logged into your app and Facebook.
			logIn(statusResponse.authResponse.accessToken, sayHello, sayNeedToRegister);
		} else {
			var greetingSpan = document.getElementById('greeting');

			greetingSpan.innerHTML = "";
		}
	}

</script>
<div id="login_header">
	<div>
		<div id="greeting"></div>
		<div class="fb-login-button" data-max-rows="1" data-size="small" data-show-faces="false" data-auto-logout-link="true"></div>
	</div>
</div>
