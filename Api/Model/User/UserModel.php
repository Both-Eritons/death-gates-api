<?php

namespace Api\Model\User;

readonly class UserModel {
  public ?int $id;
  public string $username;
  public string $password;
  public string $email;

  function __construct(
    int $id = null,
    string $username,
    string $password,
    string $email
  )
  {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
  }
}
