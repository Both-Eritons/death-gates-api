<?php

namespace Api\Service\User;

use Api\Entity\User\UserEntity;
use Api\Repository\User\UserRepository;
use App\Exception\User\NotFound;

class UserService extends UserRepository{

  function findUserById(int $id): UserEntity|NotFound
  {
    $user = $this->findById($id);

    return $user ?? throw new NotFound();
  }
}
