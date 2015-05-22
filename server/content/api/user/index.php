<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

(new GTSailing\ApiRouter(new GTSailing\Endpoints\UserEndpoint()))->handleRequest();
?>