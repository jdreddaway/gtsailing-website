<?php

use Facebook\FacebookSession;

global $appID, $appSecret;
FacebookSession::setDefaultApplication($appID, $appSecret);

?>