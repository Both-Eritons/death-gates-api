<?php

namespace Api\Controller\User;

use Api\Service\User\UserService;
use App\Constant\User as UserConstant;
use App\Exception\User\NotFound;
use App\Helper\Json;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class UserController extends Json {
  use  UserConstant;
  private UserService $user;
  function __construct(UserService $user){
    $this->user = $user;
  }

  function findUserById(Req $req, Res $res, array $args) {

    try{
      $id = $args["id"];
      $user = $this->user->findUserById($id)->__toArray();

      return $this->send($res, self::EXISTS, 200, $user);
    } catch(NotFound $e) {
      return $this->send($res, $e->getMessage(), 404);
    }
  }
}
