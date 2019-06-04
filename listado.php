<?php
  require_once "funcionesparg.php";

  if(!usuarioLogueado()){
    header("Location:index.php");
    exit;
  }
  $usuarios = listaDeUsuarios()["usuarios"];
  $usuario = traerUsuarioLogueado();

  //Dump de errores;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <<!--HEAD-->
  <?php include("head.php"); ?>




  <body>
    <!--HEADER-->
    <?php include("header.php"); ?>
    <div class="row">
      <div class="col">
        <h2>Listado de usuarios registrados</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuario</th>
              <th scope="col">Email</th>


            </tr>
          </thead>
          <tbody>
          <?php foreach ($usuarios as $datos): ?>
            <tr>
              <td><?= $datos["id"] ?></td>
              <td><?= $datos["user"] ?></td>
              <td><?= $datos["email"] ?></td>

              <td><a class="btn btn-primary btn-sm" href="<?= 'edit.php?id=' . $datos["id"] ?>">Editar</a></td>
            </tr>
          <?php endforeach; ?>
          </tbody>


        </table>
      </div>
    </div>
  </body>
</html>
