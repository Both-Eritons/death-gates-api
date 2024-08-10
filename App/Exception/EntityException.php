<?php

namespace App\Exception;

use InvalidArgumentException;

class EntityException extends InvalidArgumentException {

  function __construct($msg="ocorreu um erro ao usar a Entity!")
  {
    parent::__construct($msg);
  }

  function __toString(): string
  {
    return "[Message]: "
      .$this->getMessage()
      ."\n\n [File]: "
      .$this->getFile()
      ."\n\n [Line]: "
      .$this->getLine();
  }
}
