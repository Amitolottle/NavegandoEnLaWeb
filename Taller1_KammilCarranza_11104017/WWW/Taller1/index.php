<html>
<head>
  <title>Inicio de sesión</title>
  <meta charset="UTF-8">
</head>

<body>
  <h1>Inicia sesión</h1>
  <section>

    <!-- Mediante esta forma envío el correo para que sea validado en la base de datos mediante la pagina validarUsuario -->
    <form action="includes/validarUsuario.php" method="POST">
      <label>Correo electrónico</label><input type="text" name="correo"><br />
      <label>Contraseña</label><input type="text" name="pw"><br />
      <input type="submit" value="Iniciar sesión">
    </form>
    <h2>¿No tienes cuenta?</h2>

    <!-- Al hacer click en el enlace, se le manda al formulario de registro -->
    <h4>Registrate<a href="registro.php">Aquí</a></h4>
  </section>
  <?php
  ?>
</body></html>