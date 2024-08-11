<?php

namespace Api\Controller\User;

use Api\Service\User\UserService;
use App\Constant\User as UserConstant;
use App\Exception\User\NotFound;
use App\Exception\User\UserExists;
use App\Exception\User\UserValidation;
use App\Helper\Json;
use Damianopetrungaro\PHPCommitizen\Section\Body;
use Psr\Http\Message\ResponseInterface as Res;
use Slim\Psr7\Request as Req;

class UserController extends Json
{
  use  UserConstant;
  private UserService $user;
  function __construct(UserService $user)
  {
    $this->user = $user;
  }

  function findUserById(Req $req, Res $res, array $args)
  {

    try {
      $id = $args["id"];
      $user = $this->user->findUserById($id)->__toArray();

      return $this->send($res, self::FOUND, 200, $user);
    } catch (NotFound $e) {
      return $this->send($res, $e->getMessage(), 404);
    }
  }

  function createUser(Req $req, Res $res)
  {

    try {
      $body = $req->getBody();
      $body = json_decode($body);
    
      $user = $this->user->createUser($body->username, $body->password, $body->email)->__toArray();

      return $this->send($res, self::CREATED, 200, $user);
    } catch (UserExists | UserValidation $e) {
      return $this->send($res, $e->getMessage(), $e->getCode());
    }
  }
}
