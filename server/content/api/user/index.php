<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

handleApiRequest(new Endpoints\UserEndpoint());
?>