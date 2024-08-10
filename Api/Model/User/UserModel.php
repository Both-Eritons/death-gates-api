<?php

namespace Api\Model\User;

readonly class UserModel {
  public ?int $id;
  public string $username;
  public string $password;
  public string $email;
}
