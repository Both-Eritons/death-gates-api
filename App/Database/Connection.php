<?php

namespace App\Database;

use App\Configuration\Env\Mysql;
use PDO;
use PDOException;

class Connection  extends PDO{

  static private PDO $sql;
  function __construct(){

    try {

      self::$sql = parent::__construct(
        Mysql::getEnv("CONN"),
        Mysql::getEnv("USER"),
        Mysql::getEnv("PASS"), 
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
        ]
      );

    } catch (PDOException $e) {
      echo "PDO ERROR: ".$e->getMessage();die;
    }
  }

  static function getInstance(): PDO {

    if(!isset(self::$sql)) {
      self::$sql = new self;
    }

    return self::$sql;
  }

}
