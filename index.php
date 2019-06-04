
<?php
include_once "init.php";

if(isset($_SESSION["email"])){
  $usuario = $dbMysql->buscarPorEmail($_SESSION["email"]);
}
// var_dump($usuario);
// exit;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!--HEAD-->
<?php include("head.php"); ?>

<body>
<!--HEADER-->
<?php include("header.php"); ?>

<!--MAIN-->


<section class="portada">
  <div class="fotomain">
    <div class="hero">
    <img src="img\Travesia-El-Chalten-in-Patagonia.jpg" alt="">
  </div>
  <div class="titulo">
    <h1>Excursiones y actividades por todo el País</h1>
  </div>

  </div>

</section>

<!--PRINCIPALES-->
<section class="principales">
  <span class="span-desta">
  <h2 class="titulo-desta">PRINCIPALES DESTINOS</h2>
  </span>
  <section class="articulo">
    <div class="titulo-art">
      <img src="img/franja.jpg" alt="">
      <p class="titulo-art">Noroeste</p>
    </div>
    <img class="img-principal" src="http://placeimg.com/640/480/nature" alt="">
    <p class="descripcion-art">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, reiciendis.</p>
  </section>

  <section class="articulo">
    <div class="titulo-art">
      <img src="img/franjapatagonia.jpg" alt="">
      <p class="titulo-art">Patagonia</p>
    </div>
    <img class="img-principal" src="http://placeimg.com/640/480/nature" alt="">
    <p class="descripcion-art">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, reiciendis.</p>
  </section>

  <section class="articulo">
    <div class="titulo-art">
      <img src="img/franjalitoral.jpg" alt="">
      <p class="titulo-art">Litoral</p>
    </div>
    <img class="img-principal" src="http://placeimg.com/640/480/nature" alt="">
    <p class="descripcion-art">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, reiciendis.</p>
  </section>

  <section class="articulo">
    <div class="titulo-art">
      <img src="img/franjacuyo.jpg" alt="">
      <p class="titulo-art"> Cuyo</p>
    </div>
    <img class="img-principal" src="http://placeimg.com/640/480/nature" alt="">
    <p class="descripcion-art">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, reiciendis.</p>
  </section>
</section>
<!--DESTACADOS-->
<section class="destacados">

    <span class="span-desta">
    <h2 class="titulo-desta">ACTIVIDADES DESTACADAS</h2>
    </span>
    <div class="articulos-desta">

    <article class="destacado">

      <a href="#" class="desta-link"><img src="img\actividades\Ruta-vino.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Ruta del vino - Mendoza</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>

      <ul class="consulta-desta">


        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>

    <article class="destacado">

      <a href="#" class="desta-link"><img src="img\actividades\avistaje.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Avistaje de ballenas - Puerto Madryn</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
      <ul class="consulta-desta">
        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>

    <article class="destacado">
      <a href="#" class="desta-link"><img src="img\actividades\trekking-talampaya.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Trekking en Talampaya - La Rioja</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
      <ul class="consulta-desta">
        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>
    </article>

    <article class="destacado">
      <a href="#" class="desta-link"><img src="img\actividades\faro-fin-mundo.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Faro de San Juan de Salvamento - Tierra del Fuego</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
      <ul class="consulta-desta">
        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>

    <article class="destacado">
      <a href="#" class="desta-link"><img src="img\actividades\cerro-catedral-ski.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Esquí en el Cerro Catedral - Bariloche</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
      <ul class="consulta-desta">
        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>

    <article class="destacado">
      <a href="#" class="desta-link"><img src="img\actividades\paseo-delta.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Paseo en lancha por el Delta - Buenos Aires</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
      <ul class="consulta-desta">
        <li class="precio-desta"><a href="#">$4263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>
    <article class="destacado">

      <a href="#" class="desta-link"><img src="img\actividades\iguazu-cataratas.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Visita Cataras del Iguazú - Misiones</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>

      <ul class="consulta-desta">


        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>
    <article class="destacado">

      <a href="#" class="desta-link"><img src="img\actividades\el-palmar.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>Visita Palmar de Colón - Entre Ríos</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>


      <ul class="consulta-desta">


        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>
    <article class="destacado">

      <a href="#" class="desta-link"><img src="img\actividades\Bicitour.jpg" alt="" class="desta"></a>
      <div class="descripcion">


      <h3>BiciTour - Ciudad de Buenos Aires</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>


      <ul class="consulta-desta">


        <li class="precio-desta"><a href="#">$5263</a></li>
        <li class="consulta"><a href="#">Consultar</a></li>
      </ul>

    </article>
    </div>
</section>
<!-- FOOTER -->

<?php include("footer.php"); ?>
<!-- FOOTER ANTERIOR-->
<!--
<footer class="footer">

  <section class="mas-info">
    <h2>Más Info:</h2>
    <ul>
      <li><a href="#">Giftcards</a></li>
      <li><a href="#">Ayuda</a></li>
      <li><a href="#">Contacto</a></li>
      <li><a href="#">PostVenta</a></li>
    </ul>
  </section>

  <section class="oficinas">
    <h2>Nuestras Oficinas</h2>
    Av. Monroe 860<br>
    CABA, Buenos Aires<br>
    11-5263-7400
  </section>

  <section class="social">
    <ul>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </section>

</footer>-->

</body>
</html>
