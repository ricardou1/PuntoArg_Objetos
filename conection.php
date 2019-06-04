<?php
$dsn = "mysql:host=localhost;dbname=dhparg;port=3306";
//$dsn = "mysql:host=127.0.0.1;dbname=movies_db;port=3306";
$user = "root";
$pass = "";


try {
  $db = new PDO($dsn, $user, $pass);
  //le dice a la db que muestre los errores en PHP.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "todo bien.";
} catch (\Exception $e) {
  echo "Hubo un error <br>";
  //var_dump($e);
  echo $e->getMessage();
  exit;
}
