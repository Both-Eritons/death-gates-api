<?php
namespace App\Routes;

use App\Helper\Json;
use Slim\App;


class UserRoutes extends Json {

  private $user;
  public function __construct() {
  }

  function init(App $app) {
    $app->get("/api/user/register", function($req, $res) {
      return $this->send($res, 'funciona');
    });
  }
}
