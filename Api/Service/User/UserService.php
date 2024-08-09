<?php

namespace Api\Service\User;

use Api\Model\User\UserModel;
use Api\Repository\User\UserRepository;

class UserService extends UserRepository{

  function createUser(string $user, string $pass=null)
  {
    $this->find($user);
  }
}
