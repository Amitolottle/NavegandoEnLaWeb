<html>
<head>
  <title>Inicio de sesión</title>
  <meta charset="UTF-8">
</head>

<body>
  <h1>Inicia sesión</h1>
  <section>

    <!-- Mediante esta forma envío el ID del usuario para que 
    sea validado en la base de datos mediante la pagina validarUsuario.
    Hasta ahora hay ID's del 1 al 3 -->
    <form action="includes/validarUsuario.php" method="POST">
      <label>ID Usuario</label><input type="text" name="id"><br />
      <input type="submit" value="Iniciar sesión">
    </form>
  </section>
</body></html>