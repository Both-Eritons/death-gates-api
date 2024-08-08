<?php
require_once '../vendor/autoload.php';

use App\Helper\Json;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request as Req;
use Psr\Http\Message\ResponseInterface as Res;
use App\Configuration\DotEnv;

$app = AppFactory::create();
DotEnv::init();

$app->get('/test', function(Req $req, Res $res) {
  $json = new Json();
  return $json->send($res, "funciona");
});

$app->run();
