<?php
namespace App\Routes;

use Api\Controller\User\UserController;
use Api\Service\User\UserService;
use App\Helper\Json;
use Slim\App;


class UserRoutes extends Json {

  private UserController $user;
  public function __construct() {
    $this->user = new UserController(new UserService);
  }

  function init(App $app) {
    $app->get("/api/user/register", function($req, $res) {
     return $this->user->create($req, $res);
    });

    $app->get('/api/user/cu', function($req, $res) {

      return $res;
    });

    $app->get('/api/user/find', function($req, $res) {

      return $res;
    });

    $app->get('/api/user/delete', function($req, $res) {

      return $res;
    });

    $app->get('/api/user/', function($req, $res) {

      return $res;
    });



  }
}
