<?php

namespace Api\Entity;

abstract class Entity{
  private ?int $id;
  private string $username;
  private string $password;
  private ?string $email;

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

  public function getUsername(): string|null{
    return $this->username;
  }

  public function setPassword(string $password): self {
    $this->password = $password;
    return $this;
  }

  public function getPassword(): string|null{
    return $this->password;
  }

  public function setEmail(string $email): self {
    $this->email = $email;
    return $this;
  }

  public function getEmail(): string|null{
    return $this->email;
  }

}
