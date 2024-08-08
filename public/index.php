<?php
require_once '../vendor/autoload.php';

use App\Helper\Json;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request as Req;
use Psr\Http\Message\ResponseInterface as Res;
use App\Configuration\DotEnv;
use App\Configuration\Slim;
use App\Routes\Api;

DotEnv::init();
$routes = new Api();
Slim::Config($routes->api);
$routes->run();
