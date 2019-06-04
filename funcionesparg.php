<?php

//echo "soy funciones.php";
session_start();

function validarRegistro($datos){
  $errores =[];
  $datosFinales = [];

  foreach ($datos as $posicion => $valor) {
    if($posicion !== "hobbies"){
    $datosFinales[$posicion] = trim($valor);
    }
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

  //name
  if(strlen($datosFinales["user"]) == 0){
    $errores["user"] = "Campo obligatorio";
  }


  //email
  if(strlen($datosFinales["email"]) == 0){
    $errores["email"] = "Campo obligatorio";
  } else if (filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false){
      $errores["email"] = "Ingrese un email válido.";
  } else if(existeElUsuario($datosFinales["email"])){
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

function nextId(){
  //Que pasa si no existe db.json
  if(!file_exists("db.json")){
    $json = "";
  } else {
    $json= file_get_contents("db.json");
  }

  //Que pasa si devuelve una cadena vacía
  if($json === ""){
    return $lastID = 1;
  }
  $usuariosArray = json_decode($json, true);

  $lastUser = array_pop($usuariosArray["usuarios"]);
  $lastId = $lastUser["id"];
  return $lastId + 1;
}

function armarUsuario(){
  return [
    "id"=>nextId(), //El resultado de la función nextId
    "user"=>trim($_POST["user"]),
    "email"=>trim($_POST["email"]),
    "password"=>password_hash($_POST["pass"], PASSWORD_DEFAULT),
  ];
}

function guardarUsuario($user){
  // $json = file_get_contents("db.json");
  // $array = json_decode($json, true);
  //
  // $array["usuarios"][] = $user;
  // $array = json_encode($array, JSON_PRETTY_PRINT);
  //
  // file_put_contents("db.json", $array);


    global $db;
    $stmt = $db->prepare("INSERT INTO usuarios VALUES(default, :user, :email, :password)");

    $stmt->bindValue(":user", $user["user"] );
    $stmt->bindValue(":email",  $user["email"]);
    $stmt->bindValue(":password",  $user["password"]);

    $stmt->execute();

}

function buscarPorEmail($email) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");

  $stmt->bindValue(":email", $email);
  $stmt->execute();

  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;

}


function existeElUsuario($email){
  return buscarPorEmail($email) !== null;
}

//validar LOGIN

function validarLogin($datos){
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
  } else if(!existeElUsuario($datosFinales["email"])){ //El usuario no exista
      $errores["email"] = "El email no se encuentra registrado";
  }
  //password
  if(strlen($datosFinales["pass"]) == 0){
    $errores["pass"] = "Campo obligatorio";
  } else {
    $usuario = buscarPorEmail($datosFinales["email"]);

    if (password_verify($datosFinales["pass"], $usuario["password"])==false) { //Contraseña del usuario coincida con la contraseña hasheada
    $errores["pass"] = "Por favor verifique su contraseña.";
    }
  }
  return $errores;
}
//Crea en SESSION la posición "email" con el email para chequear que esté logueado.
  function loguearUsuario($email){
    $_SESSION["email"]= $email;
  }

  //LOGOUT
  function usuarioLogueado(){
    return isset($_SESSION["email"]);
  }
?>
