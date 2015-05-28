<?php

global $debug;
global $appID, $appSecret;
global $dbHost, $dbName, $dbUsername, $dbUserPassword;

$debug = true;

$appSecret = ''; // THIS IS SECRET!

if ($debug) {
  $appID = ''; // local_dev

  $dbHost = 'localhost';
  $dbName = 'gtsail';
  $dbUsername = 'gtsail_dev';
  $dbUserPassword = 'gtsail';
} else {
  $appID = ''; // prod

  $dbHost = '';
  $dbName = '';
  $dbUsername = '';
  $dbUserPassword = '';
}

?>