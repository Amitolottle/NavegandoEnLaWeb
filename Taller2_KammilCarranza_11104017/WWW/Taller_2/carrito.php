<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Carrito</title>

  <!-- Bootstrap -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <link href="CSS/carrito.css" rel="stylesheet">

<!-- Al igual que con las páginas anteriores, me encargo de organizar los elementos de otra manera,
mostrando otro tipo de información al usuario -->
</head>
<body>
  <nav>
    <div id="navegacion">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
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
           <a href="compras.php">Perfil</a>
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


<section>
  <div class="container"> 
    <div class="row">
      <?php
      $validarProducto="SELECT * FROM tiendaVirtual.carrito WHERE carrito.idUsuario='". $_SESSION["username"]."'";
      $resValidarProducto= mysqli_query($con,$validarProducto);
      if(mysqli_num_rows($resValidarProducto)>=1){
        echo"<h1>Productos en el carrito</h1>";
      }
      ?>
      
      <?php
      $sqlProducto="SELECT productos.nombre AS nombreProducto, productos.precio AS precio, productos.categoria AS categoria, productos.vendedor AS vendedor, productos.bombillos AS bombillos FROM tiendaVirtual.productos JOIN tiendaVirtual.carrito ON carrito.idProducto=productos.id WHERE carrito.idUsuario='". $_SESSION["username"]."'";
      $resProducto=mysqli_query($con,$sqlProducto);
      while($rowProducto=mysqli_fetch_array($resProducto)){
        echo"<div class='col-md-2'>";
        echo"<h2>$".$rowProducto["precio"]."</h2>";

         // Dependiendo de la categoria pinto un distinto fondo para
        // cada producto

        if($rowProducto["categoria"]=="Proyectos de grado"){
          echo"<div class='productoImg rojo'>";
        }
        if($rowProducto["categoria"]=="Empresas"){
          echo"<div class='productoImg azul'>";
        }
        if($rowProducto["categoria"]=="Cocina"){
          echo"<div class='productoImg verde'>";
        }
        if($rowProducto["categoria"]=="Citas"){
          echo"<div class='productoImg rosa'>";
        }

        echo"<figure>";
        echo"<img src='images/icono.png'>";
        echo"</figure>";
        echo"</div>";
        echo"<h3>".$rowProducto["nombreProducto"]."</h3>";
        echo"</br>";
        echo"<h3>".$rowProducto["categoria"]."</h3>";
        echo"</br>";
        echo"<h3>Por: ".$rowProducto["vendedor"]."</h3>";
        echo"<div class='footerProc'>";
        echo"<h3>Bombillos:</h3>";
        echo"<figure>";
        echo"<img src='images/bombilloAmarillo.png'>";
        echo"</figure>";
        echo"<h3>.".$rowProducto["bombillos"]."</h3>";
        echo"</div>";
        echo"</div>"; 
      }
      ?>
    </div>
  </div> 
</section>

<footer>

<!-- Este botón sólo aparece cuando hay por lo menos 1 producto en el carro
es aquel que permite comprar todos los objetos que estén en el carro de compras -->
  <?php

  if(mysqli_num_rows($resValidarProducto)>=1){

    echo"<a href='includes/limpiarCarrito.php?objeto=".$rowProducto." '><button type='button' class='btn btn-danger btn-lg btn-block'>Comprar</button></a>"; 
  }else{
    echo"<h1>No tienes productos en el carrito</h1>";
  }
  ?>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="JS/bootstrap.min.js"></script>
</body>

</html>