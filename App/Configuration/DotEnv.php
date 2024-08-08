<?php

namespace App\Configuration;

use Symfony\Component\Dotenv\Dotenv as Dot;



final class DotEnv
{
  static private Dot $dot;

  static function init(): void {
    $dot = self::$dot = new Dot();
    $dot->load(dirname(__DIR__, 2) . '/.env');
    
  }
}

