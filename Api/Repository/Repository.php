<?php

namespace Api\Repository;

use App\Database\Connection;

abstract class Repository{
  protected string $table = ' users ';
  protected Connection $db;

  function getConnection(): Connection{
    return $this->db = Connection::getInstance();
  }
}
