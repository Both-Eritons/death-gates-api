<?php

namespace App\Configuration\Env;

abstract class Mysql{

  static private array $arr;
  private function __construct(){
  
  }

  static private function initialize() {
    self::$arr = [
      "USER" => $_ENV["DATABASE_USER"],
      "PASS" => $_ENV["DATABASE_PASSWORD"],
      "NAME" => $_ENV["DATABASE_NAME"],
      "CONN" => "mysql:host=localhost;dbname=".$_ENV["DATABASE_NAME"]
    ];
  }

  static function getEnv(string $key = null) {
    if(!isset(self::$arr)){
      self::initialize();
    }

    if(!isset($key)) {
      return self::$arr;
    }

    return self::$arr[$key] ?? null;
  }
}
