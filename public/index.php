<?php
require_once '../vendor/autoload.php';

use App\Configuration\DotEnv;
use App\Configuration\Slim;
use App\Routes\Api;

DotEnv::init();
$routes = new Api();
Slim::Config($routes->api);
$routes->run();
