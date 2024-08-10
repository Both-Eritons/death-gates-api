<?php

namespace App\Exception\User;

use Exception;

class NotFound extends Exception {

  function __construct($msg = "Usuario nao existe!") {
    parent::__construct($msg, 404);
  }

  function __toString(): string
  {
    return "[Message]: ".$this->getMessage()."\n [LINE]: ".$this->getLine()."\n[CODE]: ".$this->getCode();
  }
}
