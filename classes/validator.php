<?php

class Validator
{
  //Funciones de validación.

  public static function validarRegistro($datos){
    global $dbMysql;

    $errores =[];
    $datosFinales = [];

    foreach ($datos as $posicion => $valor) {
      //le saque el if !=="hobbies"
      $datosFinales[$posicion] = trim($valor);
    }
    //validar Imagen
    if ($_FILES){
      //var_dump($_FILES);
      if($_FILES["avatar"]["name"] == ""){
        $errores["avatar"] = "No se seleccionó archivo.";
      } elseif($_FILES["avatar"]["error"]!==0){
        $errores["avatar"] = "Hubo un error en la subida del archivo";
      } else{
        //chequear que sea un archivo con la extensión deseada;
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        if($ext!== "jpg"){
          $errores["avatar"]= "El archivo debe ser de tipo jpg, jpeg o png";
        }
      }
    }

    //Username
    if(strlen($datosFinales["user"]) == 0){
      $errores["user"] = "Campo obligatorio";
    }

    //email
    if(strlen($datosFinales["email"]) == 0){
      $errores["email"] = "Campo obligatorio";
    } else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false){
        $errores["email"] = "Ingrese un email válido.";
    } else if($dbMysql->existeElUsuario($datosFinales["email"])){
      /*var_dump($dbMysql->existeElUsuario($datosFinales["email"]),
      $dbMysql->buscarPorEmail($datosFinales["email"])
    );*/
        $errores["email"] = "El email ya se encuentra registrado";
    }
    //password
    if(strlen($datosFinales["pass"]) == 0){
      $errores["pass"] = "Campo obligatorio";
    } else if(strlen($datosFinales["pass2"]) == 0){
      $errores["pass"] = "Por favor verifique la contraseña";
    } else if ($datosFinales["pass"] !== $datosFinales["pass2"]){
      $errores["pass"] = "Las contraseñas no coinciden";
    }

    return $errores;
  }


  public static function validarLogin($datos){
    global $dbMysql;

    $errores =[];
    $datosFinales = [];

    foreach ($datos as $posicion => $valor) {
      $datosFinales[$posicion] = trim($valor);
    }

    //email
    if(strlen($datosFinales["email"]) == 0){
      $errores["email"] = "Campo obligatorio";
    } else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false){
        $errores["email"] = "Ingrese un email válido.";
    } else if(!$dbMysql->existeElUsuario($datosFinales["email"])){ //El usuario no exista
        $errores["email"] = "El email no se encuentra registrado";
    }
    //password
    if(strlen($datosFinales["pass"]) == 0){
      $errores["pass"] = "Campo obligatorio";
    } else {
      $usuario = $dbMysql->buscarPorEmail($datosFinales["email"]);

      if (password_verify($datosFinales["pass"], $usuario->getPassword()) == false) { //Contraseña del usuario coincida con la contraseña hasheada
      $errores["pass"] = "Por favor verifique su contraseña.";
      }
    }
    return $errores;
  }


}
