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
      . self::USER_MIN_LENGTH . " Caracteres!",
    "longUser" => "Usuario Longo, deve conter no maximo "
      . self::USER_MAX_LENGTH . " Caracteres!",
    "shortPass" => "Senha Curta, deve conter no minimo "
      . self::PASS_MIN_LENGTH . " Caracteres!",
    "longPass" => "Senha Longa, deve conter no maximo "
      . self::PASS_MAX_LENGTH . " Caracteres!",
    "shortEmail" => "Email Curto, deve conter no minimo "
      . self::MAIL_MIN_LENGTH . " Caracteres!",
    "longEmail" => "Email Longo, deve conter no maximo "
    . self::MAIL_MAX_LENGTH . " Caracteres!",
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
  
  function findUserByUsername(string $username): UserEntity|NotFound
  {
    $user = $this->user->findByUsername($username);

    return $user ?? throw new NotFound();
  }

  function createUser(
    ?string $username,
    ?string $password,
    ?string $email
  ): UserEntity {

    if(!isset($username) || is_null($username))
      throw new UserValidation("Preencha o Usuario!");

    if(!isset($password) || is_null($password))
      throw new UserValidation("Preencha a Senha!");

    if(!isset($email) || is_null($email))
      throw new UserValidation("Preencha o Email!");
 

    if (strlen($username) < self::USER_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortUser']);

    if (strlen($username) > self::USER_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longUser']);

    if (strlen($password) < self::PASS_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortPass']);

    if (strlen($password) > self::PASS_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longPass']);

    if (strlen($email) < self::MAIL_MIN_LENGTH)
      throw new UserValidation($this->fMsgs['shortEmail']);
    
    if (strlen($email) > self::MAIL_MAX_LENGTH)
      throw new UserValidation($this->fMsgs['longEmail']);

    if ($this->user->findByUsername($username))
      throw new UserExists();

    $userModel = new UserModel();
    $userModel->username = $username;
    $userModel->password = $password;
    $userModel->email = $email;

    $user = $this->user->create($userModel);
    if(is_null($user)) {
      throw new UserValidation($this->fMsgs["createUserEr"]);
    }
    
    return $user;
  }
}
