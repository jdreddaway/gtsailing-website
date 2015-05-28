<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

use \PDO;

use GTSailing\ApiRouter;

use GTSailing\Endpoints\JsonSerializer;
use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Endpoints\UserEndpoint;

use GTSailing\Facebook\SessionFactory;
use GTSailing\Facebook\Requester;
use GTSailing\Facebook\Initializer;

use GTSailing\Mills\UserMill;

use GTSailing\Repositories\UserRepo;

global $dbHost, $dbName, $dbUsername, $dbUserPassword;
$connection = new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUsername, $dbUserPassword);

$userRepo = new UserRepo($connection);
$fbSessionFactory = new SessionFactory();
$fbRequester = new Requester();
$fbInitializer = new Initializer();

$userMill = new UserMill($userRepo, $fbSessionFactory, $fbRequester, $fbInitializer);
$serializer = new JsonSerializer();
$responseWriter = new ResponseWriter();

$endpoint = new UserEndpoint($userMill, $serializer, $responseWriter);

$router = new ApiRouter($endpoint, $responseWriter);

$router->handleRequest();
?>