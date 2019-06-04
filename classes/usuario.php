<?php
/**
 *
 */
class Usuario
{
  protected $id;
  protected $user;
  protected $email;
  protected $password;

  function __construct(Array $datos)
  {
    if(isset($datos["id"])){
      $this->id = $datos["id"];
      $this->password = $datos["password"];
    } else {
      $this->id = NULL;
      $this->password = password_hash($datos["password"], PASSWORD_DEFAULT);
    }

    $this->user= $datos["user"];
    $this->email = $datos["email"];


  }

  public function getId(){
      return $this->id;
  }
  public function getUser(){
      return $this->user;
  }
  public function getEmail(){
      return $this->email;
  }
  public function getPassword(){
      return $this->password;
  }


  public function setUser($user){
      $this->user = $user;
      return $this;
  }
  public function setEmail($email){
      $this->email = $email;
      return $this;
  }
  public function setPassword($password){
      $this->password = $password;
      return $this;
  }

}
