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

  function create(UserModel $user) {
   $query = "";
  }

  function findById(int $id): UserEntity | null{
    $query = "SELECT * FROM".$this->table."WHERE id = :id";
    $stmt = $this->sql->prepare($query);
    $stmt->execute([":id" => $id]);

    $row = $stmt->fetchObject("Api\Model\User\UserModel");
    
    return new UserEntity($row) ?? null;
  }

}
