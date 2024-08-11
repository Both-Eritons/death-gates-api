<?php

namespace Api\Repository\User;

use Api\Entity\User\UserEntity;
use Api\Model\User\UserModel;
use Api\Repository\Repository;
use PDO;
use ReflectionClass;

class UserRepository extends Repository{

  private $sql;

  function __construct()
  {
    $this->sql = parent::getConnection();
  }

  function create(UserModel $user): ?UserEntity {
    $query = "INSERT INTO {$this->table}(username, password, email) VALUES(:user, :pass, :email)";
    $stmt = $this->sql->prepare($query);
    $stmt->bindParam(":user", $user->username);
    $stmt->bindParam(":pass", $user->password);
    $stmt->bindParam(":email", $user->email);
    $stmt->execute();

    $row = $stmt->fetchObject("Api\Model\User\UserModel");

    if($row) return new UserEntity($row);

    return null;
  }

  function findById(int $id): ?UserEntity{
    $query = "SELECT * FROM".$this->table."WHERE id = :id";
    $stmt = $this->sql->prepare($query);
    $stmt->execute([":id" => $id]);

    $row = $stmt->fetchObject("Api\Model\User\UserModel");

    if($row) return new UserEntity($row);

    return null;
  }

  function findByUsername(string $username): ?UserEntity{
    $query = "SELECT * FROM".$this->table."WHERE username = :username";
    $stmt = $this->sql->prepare($query);
    $stmt->execute([":username" => $username]);

    $row = $stmt->fetchObject("Api\Model\User\UserModel");

    if($row) return new UserEntity($row);

    return null;
  }


}
