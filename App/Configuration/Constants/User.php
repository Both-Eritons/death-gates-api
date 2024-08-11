<?php

namespace App\Configuration\Constants;

trait User{
  public const USER_MIN_LENGTH = 6;
  public const USER_MAX_LENGTH = 24;

  public const PASS_MIN_LENGTH = 6;
  public const PASS_MAX_LENGTH = 40;

  public const MAIL_MIN_LENGTH = 15;
  public const MAIL_MAX_LENGTH = 256;
}
