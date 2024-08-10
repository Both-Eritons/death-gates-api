<?php

namespace Api\Service\User;

use Api\Repository\User\UserRepository;
use App\Exception\User\NotFound;

class UserService extends UserRepository{

  function findUserById(int $id)
  {
    $user = $this->findById($id);

    if(!$user) {
      throw new NotFound();
    }

    return $user;
  }
}
