
<?php
include_once "init.php";


if($auth->usuarioLogueado()){
	header("Location:index.php");
	exit;
}

$errores = [];
//Si viene por POST
if($_POST){
	//Validar Login
	$errores = Validator::validarLogin($_POST);
	//var_dump($errores);

	if(empty($errores)){
		//Si $erroes esta vacío
		$auth->loguearUsuario($_POST["email"]);

		//logueamos al user => Ponemos el email del user en sesión => necesitamos session_start al incio de todos nuestros archivos

		//redirigimos a home.
		header("Location:index.php");
		exit;
	}
}



//Dump de errores;
 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<!--HEAD-->
<?php include("head.php"); ?>

<body>
<!--HEADER-->
<?php include("header.php"); ?>

<!-- REGISTRO -->

	<div class="registro2">

	<form class="login" action="login.php" method="POST"
	enctype="multipart/form-data">
		<h2>MI CUENTA</h2>
	<div class="contenedor">


	<div class="datosUsuario">
		<p>
			<input id= "email" type="email" name="email" value="" placeholder="Email">
			<i class="fa fa-envelope fa-lg fa-fw" ></i>
			</p>

			<?php if(isset($errores["email"])): ?>
				<span class="error"><?= $errores["email"] ?></span>
			<?php endif ?>
</div>
<div class="datosUsuario">
	<p>
			<input id= "pass" type="password" name="pass" value="" placeholder="Contraseña">
			<i class="fas fa-key" ></i>
			</p>
			<?php if(isset($errores["pass"])): ?>
				<span class="error"><?= $errores["pass"] ?></span>
			<?php endif ?>
		</div>
			</div>

		<div class="recuperoContraseña">
		<p> <a href="#">Olvidé mi contraseña</a>  </p>

		</div>

	<div class="boton">

	<div id="boton"class="botones">
	<p>
		<label for="Ingresar"></label>
		<input  id= "submit" type="submit" name="enviar" value="Ingresar">
	</p>

		</div>
			</div>
			<div class="crearCuenta">
				<div class="">
					<p>¿No tienes una cuenta?</p>
					<p> <a href="registro.php">CREAR CUENTA</a> </p>
				</div>

			</div>

	</form>
			</div>

	<!-- FOOTER -->
<?php include("footer.php"); ?>

</body>
</html>
