<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Catalogo</title>

  <!-- Bootstrap -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <link href="CSS/main.css" rel="stylesheet">

<!-- Basicamente, hago lo mismo que en el Index, con la diferencia que
se seleccionan todos los productos existentes, sin importar la
cantidad de bombillos que tengan. -->
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
           <a class="resaltado" href="catalogo.php">Catalogo</a>
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
      <h1>Todos los productos</h1>
      <?php
      $sqlProducto="SELECT productos.nombre AS nombreProducto, productos.id AS idProducto, productos.precio AS precio, productos.categoria AS categoria, productos.bombillos AS bombillos FROM tiendaVirtual.productos";
      $resProducto=mysqli_query($con,$sqlProducto);
      while($rowProducto=mysqli_fetch_array($resProducto)){
        echo"<div class='col-md-4'>";
        echo"<div class='headerProc'>";
        echo"<h3>$".$rowProducto["precio"]."</h3>";
        echo"<div class='titulo'>";
        echo"<h3>".$rowProducto["nombreProducto"]."</h3>";
        echo"</div>";
        echo"<figure>";
        echo"<a href='includes/agregarAlCarro.php?idProducto=".$rowProducto["idProducto"]."'><img src='images/carroPeque.png'></a>";
        echo"</figure>";
        echo"<hr>"; 
        echo"</div>"; 

        if($rowProducto["categoria"]=="Proyectos de grado"){
          echo"<div class='producto rojo'>";
        }
        if($rowProducto["categoria"]=="Empresas"){
          echo"<div class='producto azul'>";
        }
        if($rowProducto["categoria"]=="Cocina"){
          echo"<div class='producto verde'>";
        }
        if($rowProducto["categoria"]=="Citas"){
          echo"<div class='producto rosa'>";
        }

        echo"<hr>";
        echo"<figure>";
        echo"<img src='images/icono.png'>";
        echo"</figure>";
        echo"<div class='footerProc'>";
        echo"<div class='tituloBajo'>";
        echo"<h3>".$rowProducto["categoria"]."</h3>";
        echo"<figure>";
        echo"</div>";
        if($rowProducto["bombillos"]>=50){
          echo"<img src='images/bombilloAmarillo.png'>";
        }else{
          echo"<img src='images/bombillo.png'>";
        }
        echo"</figure>";
        echo"<h3>".$rowProducto["bombillos"]."</h3>";
        echo"</div>";
        echo"</div>";
        echo"</div>"; 
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