<?php

namespace Api\Repository\User;

use Api\Model\User\UserModel;
use App\Database\Connection;

class UserRepository{
  private string $table = ' users ';
  private Connection $sql;

  function __construct(){
    $this->sql = Connection::getInstance();
  }

  function create(UserModel $user) {
   $query = "";
  }

  function findById(int $id){
    $query = "SELECT * FROM".$this->table."WHERE id = :id";
    $stmt = $this->sql->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $row = $stmt->fetch();
    
    return $row ?? null;
  }

}
