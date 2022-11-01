<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

$routes = require_once('routes.php');
$config = require_once('config.php');

require_once('src/Autoloader.php');
require_once('constants.php');

Autoloader::register();

$apiApp = new ApiApplication();
$apiApp->run($routes, $config);

