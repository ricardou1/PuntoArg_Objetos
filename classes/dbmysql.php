<?php
include "db.php";
include "usuario.php";

/**
 *
 */
class dBMysql extends Db{
  protected $conection;

  function __construct()
  {
    $dsn = "mysql:host=localhost;dbname=dhparg;port=3306";
    $user = "root";
    $pass = "";


    try {
      $this->conection = new PDO($dsn, $user, $pass);
      //le dice a la db que muestre los errores en PHP.
      $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //echo "todo bien.";
    } catch (\Exception $e) {
      echo "Hubo un error <br>";
      //var_dump($e);
      echo $e->getMessage();
      exit;
    }

  }

  public function guardarUsuario(Usuario $usuario){

    $stmt = $this->conection->prepare("INSERT INTO usuarios VALUES(default,:user, :email,:password)");
    $stmt->bindValue(":user", $usuario->getUser());
    $stmt->bindValue(":email", $usuario->getEmail());
    $stmt->bindValue(":password", $usuario->getPassword());

    $stmt->execute();

  }

  function buscarPorEmail($email) {
    $stmt = $this->conection->prepare("SELECT * FROM usuarios WHERE email = :email");

    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

    if($consulta == false){
      return NULL;
    } else {
      $usuario = new Usuario($consulta);
      return $usuario;
    }

  }

  public function existeElUsuario($email){
    return $this->buscarPorEmail($email) !== null;
  }
}
