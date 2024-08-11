<?php

namespace App\Exception\User;

use Exception;

class UserValidation extends Exception {

  function __construct($msg='ocorreu algum erro ao validar!', $code=400)
  {
    parent::__construct($msg, $code);
  }
}
