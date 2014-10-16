
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Log in</title>

  <!-- Bootstrap -->
  <link href="CSS/bootstrap.min.css" rel="stylesheet">
  <link href="CSS/login.css" rel="stylesheet">

</head>
<body>

<!-- Haciendo uso de bootstrap, me basé para crear una división en columnas 
y que así la maquetación concordara lo más exacto con el archivo PDF
ya que en dicho archivo también utilicé la misma división -->
  <nav>
    <div id="navegacion">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <h1>Log in</h1>
          </div>
          <div class="col-md-10">

          <!-- Valido el usuario, buscandolo en la base de datos
          utilizando un formulario -->
            <form action="includes/validarUsuario.php" method="POST">
              <div class="col-md-4">
                <label>Correo</label><input type="text" name="correo">
              </div>

              <div class="col-md-5 col-md-offset-1">
                <label>Clave de acceso</label><input type="password" name="pw">
              </div>
              <input type="submit" class="btn btn-default" value="Entrar">
            </form>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </nav>

  <div id="cuerpo">
    <section>
      <div class="container"> 
        <div class="row">

          <div class="col-md-4">
           <div id="logo">
            <figure>
              <img src="images/logo.png">
            </figure>
          </div>
        </div>

        <!-- Registro normal del usuario, utilizando un formulario y añadiendolo
        a la base de datos -->
        <div class="col-md-5 col-md-offset-2">
          <div id="registro">
            <h2>Registrate</h2>
            <form action="includes/registrarUsuario.php" method="POST">
              <label>Nombre y apellido</label><input type="text" name="nombres">
            </br>
            <label>Correo</label><input type="text" name="correo">
          </br>
          <label>Clave de acceso</label><input type="password" name="pw">
        </br>
        <label>Confirmar clave</label><input type="password" name="confirmarPw">
      </br>
      <input type="submit" class="btn btn-default" value="Registrarse">
    </form>
  </div>
</div> 
</div>
</div>
</section>

<footer>
  <h1>Todas las ideas deben tener un dueño</h1>
</footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="JS/bootstrap.min.js"></script>
</body>
</html>