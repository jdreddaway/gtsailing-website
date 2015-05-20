<?php
	$DEBUG = true;

	function __autoload($className) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/../classes/' . $className . '.class.php';
		if (file_exists($path)) {
			require($path);
		} else {
			throw new Exception("Could not load $className");
		}
	}

	function requireOnce($path) {
		require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes' . $path);
	}
	
	function underConstruction() {
		global $DEBUG;
		
		if (!$DEBUG) {
			header("HTTP/1.1 307 Temporary Redirect");
			header('Location: /construction.php');
		}
	}

	function addFlowBackgroundImage($imageName) {
		print("
			<div class='background'>
				<img src='/images/backgrounds/${imageName}_top.png' />
				<img src='/images/backgrounds/${imageName}_mid.jpg' />
				<img src='/images/backgrounds/${imageName}_bot.png' />
			</div>
		");
	}

	/**
	 * Calls the appropriate method on $endpoint to handle the request.
	 *
	 * @param Endpoint $endpoint
	*/
	function handleApiRequest($endpoint) {
		$method = $_SERVER['REQUEST_METHOD'];

		switch ($method) {
			case 'OPTIONS':
				$endpoint->options();
				break;
			case 'GET':
				$endpoint->get();
				break;
			case 'HEAD':
				$endpoint->head();
				break;
			case 'POST':
				$endpoint->post();
				break;
			case 'PUT':
				$endpoint->put();
				break;
			case 'DELETE':
				$endpoint->delete();
				break;
			default:
				throw new Exception("Unrecognized method $method");
		}
	
	}
?>