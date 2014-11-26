<?php include_once('includes/api/database.php') ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
  </style>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body onload="initialize()">
  <div class="row">
    <div class="col-md-3">
      <h4 id="texto">Arrastrar aquí</h4>
       <!-- Esta sección contiene los íconos que el usuario puede arrastrar al canvas, a cada imagen le asigno
       un respectivo id que me permite poderla usar a con JS y Canvas -->
      <section id="cajaImagenes">
        <h4>Arrastra el ícono del lugar que quieres
          encontrar</h4>
          <img id="Restaurante" src="img/restaurante.png">
          <img id="Bar" src="img/bar.png">
          <img id="Estacion" src="img/bus.png">
        </section>

        <!-- En esta sección va el canvas en donde se dibujarán los íconos y un botón para refrescar la pantalla -->
        <section id="cajaSoltar">
          <canvas id="lienzo" height="340"></canvas>
          <button id="boton" type="button" class="btn btn-primary btn-lg btn-block">Limpiar Área</button>
        </section>

      </div>
      <div class="col-md-9">
      <!-- En esta sección me encargo de llamar al map_canvas que se pinta a partir de funciones en JS -->
        <div id="map_canvas" style="height:658px"></div>
      </div>

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCaab8OrK_KEDS9LQOaEpxRIKew75pzDMw&sensor=true">
  </script>

</body>
</html>
