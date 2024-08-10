<?php

namespace Api\Entity\User;

use Api\Entity\Entity;
use Api\Model\User\UserModel;
use App\Exception\EntityException;

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

  function emailIsValid() {
    if(!isset($this->email)){
      throw new EntityException();
    }

    return filter_var($this->email, FILTER_VALIDATE_EMAIL);
  }

  function setPasswordBash(string $pass): self
  {
    $passwordHashed = password_hash($pass, '2y');
    $this->setPassword($passwordHashed);

    return $this;
  }

}

