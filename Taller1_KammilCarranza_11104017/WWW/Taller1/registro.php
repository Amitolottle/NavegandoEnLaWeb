<html>
<head>
    <title>Registro de usuario</title>
    <meta charset="UTF-8">
</head>


<body>
    <h2>Ingresa tus datos</h2>
    <section>

    <!-- Formulario que se encarga de enviar la información entregada por el usuario a la
    pagina de registrarUsuario -->
      <form action="includes/registrarUsuario.php" method="POST">
        <label>Correo electrónico</label><input type="text" name="correo"><br />
        <label>Nombre</label><input type="text" name="nombre"><br />
        <label>Apellido</label><input type="text" name="apellido"><br />
        <label>Contraseña</label><input type="text" name="pw"><br />
        <label>Confirmar Contraseña</label><input type="text" name="confirmar"><br />
        <input type="submit" value="Registrarse">
    </form>
</section>
<?php
?>
</body></html>