<?php
namespace App\Routes;

use Api\Controller\User\UserController;
use Api\Repository\User\UserRepository;
use Api\Service\User\UserService;
use App\Helper\Json;
use Slim\App;


class UserRoutes extends Json {

  private UserController $user;
  public function __construct() {
    $this->user = new UserController(new UserService(
      new UserRepository
    ));
  }

  function init(App $app) {
    $app->get("/api/user/find/{id}", function($rq, $rs, $as) {
     return $this->user->findUserById($rq, $rs, $as);
    });

    $app->post('/api/user/register', function($req, $res) {
      return $this->user->createUser($req, $res);
    });

    /*$app->get('/api/user/find/{user}', function($rq, $rs, $as) {

      return $res;
    });*/

    $app->get('/api/user/delete', function($req, $res) {

      return $res;
    });

    $app->get('/api/user/', function($req, $res) {

      return $res;
    });



  }
}
