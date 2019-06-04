
<?php
require_once 'funcionesparg.php';

$usuario = traerUsuarioLogueado();
//var_dump($_SESSION, $usuario);

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<!--HEAD-->
<?php include("head.php"); ?>
  <body>
    <!--HEADER-->
    <?php include("header.php"); ?>
<section class="faq">
  <div class="preguntas">
    <h1>Preguntas frecuentes</h1><br>
    <ul>
      <li>¿Cuándo se activa mi abono Argentina Pass?</li>
      <li>  ¿Hay un límite en el número de atracciones que puedo ver en un día?</li>
      <li>¿Puedo visitar la misma atracción más de una vez?</li>
      <li>¿tienen que usarse en días consecutivos?</li>
      <li>  ¿Y si pierdo mi abono Argentina Pass?</li>
      <li>El Argentina Pass, ¿ofrece descuentos a los usuarios del Metro?</li>
      <li>Tengo un vale electrónico. ¿Dónde puedo recoger mi Pass?</li>
        <li>¿Tengo que recoger los Pass el mismo día en que los compro en línea?</li>
        <li>  La recogida del Pass en la sede de rescate, ¿activará mi tarjeta?</li>
        <li>¿Pueden enviarme mi Pass y mi Guía?</li>

    </ul>


  </div>

</section>

  </body>
</html>
