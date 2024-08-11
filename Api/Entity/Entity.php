<?php

namespace Api\Entity;

use Api\Model\User\UserModel;

abstract class Entity{
  protected ?int $id = null;
  protected string $username;
  protected string $password;
  protected string $email;

  public function setId(int $id): self {
    $this->id = $id;
    return $this;
  }

  public function getId(): int|null{
    return $this->id;
  }

  public function setUsername(int $username): self {
    $this->username = $username;
    return $this;
  }

  public function getUsername(): string{
    return $this->username;
  }

  public function setPassword(string $password): self {
    $this->password = $password;
    return $this;
  }

  public function getPassword(): string{
    return $this->password;
  }

  public function setEmail(string $email): self {
    $this->email = $email;
    return $this;
  }

  public function getEmail(): string{
    return $this->email;
  }

  function __toArray(): array {
    $array = array(
      "id" => $this->getId(),
      "username" => $this->getUsername(),
      "password" => $this->getPassword(),
      "email" => $this->getEmail()
    );

    return $array;
  }

  function __toModel(): UserModel {
    $user = new UserModel();
    $user->id = $this->getId();
    $user->username = $this->getUsername();
    $user->password = $this->getPassword();
    $user->email = $this->getEmail();

    return $user;
  }
}
