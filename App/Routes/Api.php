<?php

namespace App\Routes;

use Slim\App;
use Slim\Factory\AppFactory;

class Api extends AppFactory {
  private $user;
  public $api;
  function __construct() {
    $this->api = self::create();
    $this->user = new UserRoutes();
  }

  private function routes() {
    $this->user->init($this->api);
  }

  function run() {
    $this->routes($this->api);

    return $this->api->run();
  }
}
