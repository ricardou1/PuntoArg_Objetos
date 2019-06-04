<?php
include_once "init.php";



if($auth->usuarioLogueado()){
  header("Location:index.php");
  exit;
}

$errores = [];

$nameOk = "";
$emailOk = "";

if($_POST){
  //Validar los campos y a devolver errroes.

  $errores = Validator::validarRegistro($_POST);
  //var_dump($errores);

  $nameOk = trim($_POST["user"]);
  $emailOk = trim($_POST["email"]);


  if(empty($errores)){
    //Si no hay $errores
      // Crear usaurio
      if(!$dbMysql->existeElUsuario($_POST["email"])){ //Esta validación se puede pasar tambien en los errores. En ese caso hay que chequear previamente que el archivo .json exista.
      $usuario = new Usuario($_POST); // armarUsuario();
      var_dump($usuario);
      //exit;
      // Guardar usuario.
      $dbMysql->guardarUsuario($usuario);

      // Guardar imagen
      $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/" . $usuario->getEmail() . "." . $ext);

      $auth->loguearUsuario($_POST["email"]);

      // Redirigir  a home logueado.
      header("Location:index.php");
      exit;
    }
  }
}

?>



<!DOCTYPE html>
<html lang="es" dir="ltr">
<!--HEAD-->
<?php include("head.php"); ?>

<body>
<!--HEADER-->
<?php include("header.php"); ?>


<!-- REGISTRO -->
	<section class="registro2">
		<div class="formulario">
			<h2>REGISTRO</h2>
		<form class="registro" action="registro.php" method="POST" enctype="multipart/form-data">


			<?php if(isset($errores["user"])):?>
			<div class="datosUsuario">
				<p>
					<input id= "user" type="usuario" name="user" value="" placeholder="Usuario">
						<i id="user"class="fas fa-user"></i>
						  <span class="error"><?= $errores["user"] ?></span>
				</p>
			</div>
			  <?php else: ?>

					<div class="datosUsuario">
						<p>
							<input id= "user" type="usuario" name="user" value="<?= $nameOk ?>" placeholder="Usuario" >
								<i id="user"class="fas fa-user"></i>

						</p>
					</div>
					  <?php endif; ?>

		<?php if (isset($errores["email"])): ?>
		<div class="datosUsuario">
			<p>
				<input id= "email" type="email" name="email" value="" placeholder="Email">
					<i class="fa fa-envelope fa-lg fa-fw"></i>
					  <span class="error"><?= $errores["email"]?></span>

			</p>
		</div>
		<?php else: ?>
			<div class="datosUsuario">
				<p>
					<input id= "email" type="email" name="email" value="<?= $emailOk ?>" placeholder="Email" >
						<i class="fa fa-envelope fa-lg fa-fw"></i>

				</p>
			</div>
			<?php endif; ?>

			<?php if (isset($errores["pass"])): ?>
		<div class="datosUsuario">
				<p>
					<input id= "pass" type="password" name="pass" value="" placeholder="Contraseña">
					<i class="fas fa-key"></i>
						<span class="error"><?= $errores["pass"] ?></span>
				</p>

		</div>

		<div class="datosUsuario">
				<p>
				<input id= "pass2" type="password" name="pass2" value="" placeholder="Repetir contraseña">
					<i class="fas fa-key"></i>
					<span class="error"><?= $errores["pass"] ?></span>
				</p>
		</div>
		  <?php else: ?>
				<div class="datosUsuario">
						<p>
							<input id= "pass" type="password" name="pass" value="" placeholder="Contraseña">
							<i class="fas fa-key"></i>

						</p>

				</div>

				<div class="datosUsuario">
						<p>
						<input id= "pass2" type="password" name="pass2" value="" placeholder="Repetir contraseña">
							<i class="fas fa-key"></i>

						</p>
				</div>
				  <?php endif; ?>
          <div class="datosUsuario">
            <label for="avatar">Imagen de perfil</label>
            <div class="datosUsuario">
            <input type="file" id="avatar" class="" name="avatar">
            </div>
            <?php if (isset($errores["avatar"])): ?>
              <span class="error"><?= $errores["avatar"]?></span>
            <?php endif; ?>
          </div>

		<div class="acepta">
			<p>
			Al crear la cuenta aceptas nuestra <a href="#"> política de privacidad.</a> </p>
		</div>
    <!--Como funcionan los captcha?-->
		<!--<div class="captcha">
			<iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lf8DV4UAAAAAASCK2DF67REViA95WPoXf-1vZsH&amp;co=aHR0cHM6Ly93d3cuZGVzcGVnYXIuY29tLmFyOjQ0Mw..&amp;hl=es-419&amp;v=v1552285980763&amp;size=normal&amp;cb=c0u1s2z1hzau" width="304" height="78" role="presentation" name="a-oy8120dsib61" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>

		</div> -->


		<div class="boton">


		<div id="boton"class="botones">
		<p>

			<input  id= "submit" type="submit" name="enviar" value="Registar">
		</p>

			</div>
				</div>
		</form>
		</div>
	</section>

	<!-- FOOTER -->
<?php include("footer.php"); ?>
</body>
</html>
