<?php
require_once '../vendor/autoload.php';

use App\Helper\Json;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request as Req;
use Psr\Http\Message\ResponseInterface as Res;

$app = AppFactory::create();

$app->get('/test', function(Req $req, Res $res) {
  $json = new Json();
  return $json->send($res, "funciona");
});

$app->run();
