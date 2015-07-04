<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

use GTSailing\DI\ProdContainerBuilderFactory;
use GTSailing\Endpoints\ApiRouter;
use GTSailing\Endpoints\UserEndpoint;
use GTSailing\Endpoints\ResponseWriter;

$container = (new ProdContainerBuilderFactory())->create()->build();
$endpoint = $container->get(UserEndpoint::class);
$writer = $container->get(ResponseWriter::class);
$router = new ApiRouter($endpoint, $writer);
$router->handleRequest();

?>