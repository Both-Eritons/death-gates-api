<?php

namespace App\Exception\User;

use Exception;

class UserExists extends Exception {

  function __construct()
  {
    parent::__construct("esse usuario ja existe!", 400);
  }

}
