<?php
class Auth{
 function __construct(){
   session_start();
   //pasar el email de la cookie
 }

//Crea en SESSION la posición "email" con el email para chequear que esté logueado.
  public function loguearUsuario($email){
    
    $_SESSION["email"]= $email;
  }

  //LOGOUT
  public function usuarioLogueado(){
    return isset($_SESSION["email"]);
  }

}

 ?>
