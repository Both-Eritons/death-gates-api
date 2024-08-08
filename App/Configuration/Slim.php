<?php

namespace App\Configuration;

use Slim\App;
use Slim\Exception\HttpNotFoundException as NotFound;

class Slim{

  static function Config(App $app) {
    $errMid = $app->addErrorMiddleware(true, true, true);

    $errMid->setErrorHandler(NotFound::class, function() use($app) {

      $res = $app->getResponseFactory()->createResponse(404);

      $json = array(
        "message" => "rota nao encontrada",
        "httpCode" => $res->getStatusCode()
      );
      $json  = json_encode($json, JSON_PRETTY_PRINT);

      $res->getBody()->write($json);
      return $res;
    });


  }

}
