<?php

namespace Api\Entity\User;

use Api\Entity\Entity;
use Api\Model\User\UserModel;

class UserEntity extends Entity {

  private ?int $id;
  private string $username;
  private string $password;
  private ?string $email;

  function __construct(UserModel $user){
    $this->id = $user->id;
    $this->username = $user->username;
    $this->password = $user->password;
    $this->email = $user->email;
  }
 
}

