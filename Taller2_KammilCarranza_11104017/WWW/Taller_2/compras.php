<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Perfil</title>

  <!-- Bootstrap -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <link href="CSS/compras.css" rel="stylesheet">

</head>
<body>
  <nav>
    <div id="navegacion">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
<!--           Esta parte de la barra de navegación es la misma del index -->
            <?php
            include_once("includes/database.php");
            $sql="SELECT usuarios.nombre AS nombre, usuarios.id AS idUsuario, usuarios.rutaImagen AS imagen  FROM tiendaVirtual.usuarios WHERE usuarios.id='". $_SESSION["username"]."'";
            $resultado=mysqli_query($con,$sql);

            while ($row= mysqli_fetch_array($resultado)) {
              echo"<h1>".$row["nombre"]."</h1>";
              ?>

            </div>
            <div class="col-md-2 col-md-offset-1">
              <figure>
                <?php
                echo"<img src=".$row["imagen"].">";
              }
              ?>
              
            </figure>
          </div>
          <div class="col-md-5">

           <a href="index.php">Home</a>
           <a class="resaltado" href="compras.php">Perfil</a>
           <a href="catalogo.php">Catalogo</a>
           <a href="includes/terminarSesion.php">Salir</a>

         </div>
       </div>
     </div>
     <hr>
     <hr>
   </div>
 </nav>

 <div class="container">
  <div class="row">
    <div class="col-md-2 col-md-offset-5">
      <div id="circulo">
       <figure>
        <a href="carrito.php"><img src="images/carrito.png"></a>
      </figure>
      <?php
      $sqlCarro="SELECT carrito.id FROM tiendaVirtual.carrito WHERE carrito.idUsuario='". $_SESSION["username"]."'";
      $tempCarro=mysqli_query($con,$sqlCarro);
      $filasTempCarro= mysqli_num_rows($tempCarro);
      echo"<h3>".$filasTempCarro."</h3>";
      ?>
    </div>
  </div>
</div>
</div>

<!-- Organizo los elementos de otra forma y muestro otro tipo de información
que me parece es más importante para esta página -->
<section>
  <div class="container"> 
    <div class="row">
      <h1>Tus compras</h1>
      <div class="col-md-12">
        <div class="barra">
          <h2>Precio</h2>
          <h2>Fecha de Compra</h2>
          <h2>Nombre de la idea</h2>
          <h2>Vendedor</h2>
          <h2>Categoria</h2>
        </div>
      </div>
      <?php
      $sqlProducto="SELECT productos.nombre AS nombreProducto, productos.precio AS precio, productos.categoria AS categoria, productos.vendedor AS vendedor, compras.fecha AS fecha FROM tiendaVirtual.productos JOIN tiendaVirtual.compras ON compras.idProducto=productos.id WHERE compras.idUsuario='". $_SESSION["username"]."'";
      $resProducto=mysqli_query($con,$sqlProducto);
      while($rowProducto=mysqli_fetch_array($resProducto)){
        echo"<div class='col-md-12'>";

        // Dependiendo de la categoria pinto un distinto fondo para
        // cada producto

        if($rowProducto["categoria"]=="Proyectos de grado"){
          echo"<div class='barra rojo compra'>";
        }
        if($rowProducto["categoria"]=="Empresas"){
          echo"<div class='barra azul compra'>";
        }
        if($rowProducto["categoria"]=="Cocina"){
          echo"<div class='barra verde compra'>";
        }
        if($rowProducto["categoria"]=="Citas"){
          echo"<div class='barra rosa compra'>";
        }

        echo"<h2>$".$rowProducto["precio"]."</h2>";
        echo"<h2>".$rowProducto["fecha"]."</h2>";
        echo"<h2>".$rowProducto["nombreProducto"]."</h2>";
        echo"<h2>".$rowProducto["vendedor"]."</h2>";
        echo"<h2>".$rowProducto["categoria"]."</h2>";
        echo"</div>";
        echo"</div>"; 
        echo"<hr>";
      }
      ?>
    </div>
  </div> 
</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="JS/bootstrap.min.js"></script>
</body>

</html>