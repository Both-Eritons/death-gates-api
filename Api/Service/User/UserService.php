<?php

namespace Api\Service\User;

use Api\Entity\User\UserEntity;
use Api\Model\User\UserModel;
use Api\Repository\User\UserRepository;
use App\Configuration\Constants\User as Msg;
use App\Exception\User\NotFound;
use App\Exception\User\UserExists;
use App\Exception\User\UserValidation;

class UserService
{
  use Msg;

  private array $fMsgs = [
    "shortUser" => "Usuario Curto, deve conter no minimo "
      . Msg::USER_MIN_LENGTH . " Caracteres!",
    "longUser" => "Usuario Longo, deve conter no maximo "
      . Msg::USER_MAX_LENGTH . " Caracteres!",
    "shortPass" => "Senha Curta, deve conter no minimo "
      . Msg::PASS_MIN_LENGTH . " Caracteres!",
    "longPass" => "Senha Longa, deve conter no maximo "
      . Msg::PASS_MAX_LENGTH . " Caracteres!",
    "shortEmail" => "Email Curto, deve conter no minimo "
      . Msg::MAIL_MIN_LENGTH . " Caracteres!",
    "longEmail" => "Email Longo, deve conter no maximo "
    . Msg::MAIL_MAX_LENGTH . " Caracteres!",
    "createUserEr" => "ocorreu algum erro ao tentar criar usuario!"
  ];
  private UserRepository $user;
  function __construct(UserRepository $user)
  {
    $this->user = $user;
  }

  function findUserById(int $id): UserEntity|NotFound
  {
    $user = $this->user->findById($id);

    return $user ?? throw new NotFound();
  }

  function createUser(
    string $username,
    string $password,
    string $email
  ): UserEntity {

    if (strlen($username) < Msg::USER_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortUser']);

    if (strlen($username) > Msg::USER_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longUser']);

    if (strlen($password) < Msg::PASS_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortPass']);

    if (strlen($password) > Msg::PASS_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longPass']);

    if (strlen($email) < Msg::MAIL_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortEmail']);
    
    if (strlen($email) > Msg::MAIL_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longEmail']);

    if ($this->user->findByUsername($username))
      throw new UserExists();

    $userModel = new UserModel();
    $userModel->username = $username;
    $userModel->password = $password;
    $userModel->email = $email;

    $user = $this->user->create($userModel);

    return $user ?? throw new UserValidation($this->fMsgs["createUserEr"]);
  }
}
