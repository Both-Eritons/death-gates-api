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
    $app->get("/api/user/find/id/{id}", function($rq, $rs, $as) {
     return $this->user->findUserById($rq, $rs, $as);
    });
    
    $app->get('/api/user/find/username/{name}', function($rq, $rs, $as) {
      return $this->user->findUserByUsername($rq, $rs, $as);
    });

    $app->post('/api/user/register', function($req, $res) {
      return $this->user->createUser($req, $res);
    });

    
    $app->delete('/api/user/delete/username/{name}', function($rq, $rs, $as) {
      return $this->user->deleteUser($rq, $rs, $as);
    });

    $app->get('/api/user/', function($req, $res) {

      return $res;
    });



  }
}
