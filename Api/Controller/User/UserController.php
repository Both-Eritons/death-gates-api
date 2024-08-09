<?php

namespace Api\Controller\User;

use Api\Repository\User\FindParams;
use Api\Service\User\UserService;
use App\Helper\Json;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class UserController extends Json {
  private UserService $user;
  function __construct(UserService $user){
    $this->user = $user;
  }

  function create(Req $req, Res $res) {
    $c = $this->user->findById(1);
    var_dump($c);
    return $this->send($res, "funciona", 200);
  }
}
