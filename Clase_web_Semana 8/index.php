<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<html>
<head>
	<title>Taller_Mensajeria</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<meta name="viewport" content="width=device-width">
</head>
<body>
	<header>
		<?php
	/*Query encargado de acceder a los datos del usuario con el cual
	se inició sesión. Estos datos los utilizo para mostrar el nombre,
	imagen de perfil, cantidad total de favoritos y cantidad de comentarios
	realizados*/
	include_once("includes/database.php");
	$sql="SELECT usuarios.nombre AS nombre, usuarios.idUsuario AS idUsuario, usuarios.urlImg AS imagen  FROM Mensajeria_Web.usuarios WHERE usuarios.idUsuario='". $_SESSION["username"]."'";
	$resultado=mysqli_query($con,$sql);

	while ($row= mysqli_fetch_array($resultado)) {
		echo"<h1>".$row["nombre"]."</h1>";
		?>
		<div id="fondoPerfil">
			<figure>
				<img src="images/banner.jpg" >
			</figure>
		</div>
		<?php
		echo"<div class='fotoPerfil'>";
		echo"<figure>";
		echo"<img src=".$row["imagen"]." id='perfil'>";
		echo"</figure>";
		echo"</div>";

		/*Los siguientes 2 querys se encargan de recolectar la cantidad total 
		de favoritos y de comentarios del usuario que inició sesión. Este valor
		es el entregado al objeto $_SESSION. Luego de esto, cuento la cantidad
		de filas que equivalen a la cantidad de favoritos o comentarios que tiene
		este usuario en particular*/
		$sqlFavs="SELECT favoritos.idUsuario FROM Mensajeria_Web.favoritos WHERE favoritos.idUsuario='".$row["idUsuario"]."'";
		$favs=mysqli_query($con,$sqlFavs);
		$filasTotalFavs= mysqli_num_rows($favs);
		echo"<h4>".$filasTotalFavs."</h4>";

		$sqlCom="SELECT comentarios.idUsuario FROM Mensajeria_Web.comentarios WHERE comentarios.idUsuario='".$row["idUsuario"]."'";
		$com=mysqli_query($con,$sqlCom);
		$filasTotalComent= mysqli_num_rows($com);
		echo"<h4 id='hijo'>".$filasTotalComent."</h4>";
	}
	?>


	<h2>Postea algo</h2>
	<form action="includes/postear.php" method="POST" id="forma">
	</form>
	<textarea rows="5" cols="22" name="area" form="forma"></textarea>
	<div id="cualidades">
		<figure>
			<img src="images/GStar.jpg">
		</figure>
		<h3>Favoritos</h3>

		<figure>
			<img src="images/GGlobe.jpg">
		</figure>
		<h3>Comentarios</h3>
	</div>
</header>

<section>

	<?php

	/*Busco en toda la base de datos información de usuarios que se relacione
	los comentarios que han hecho y la cantidad de favoritos de este comentario
	de esta forma añado cada articulo dependiendo  de la cantidad de comentarios
	encontrados*/
	$sqlDatos="SELECT usuarios.idUsuario AS idUsuario, usuarios.nombre AS nombre, usuarios.urlImg AS imagen, usuarios.bgColor AS bgColor, comentarios.elComentario AS comentario, comentarios.id AS idComent FROM Mensajeria_Web.usuarios JOIN Mensajeria_Web.comentarios ON usuarios.idUsuario= comentarios.idUsuario";
	$resDatos=mysqli_query($con,$sqlDatos);

	while ($row=mysqli_fetch_array($resDatos)) {
		echo"<article style='background-color:".$row["bgColor"]."'>";
		echo"<figure>";
		echo"<img id='estrellas' src='images/YStars.png'>";
		echo"</figure>";

			/*Con una Query similar a la de los favoritos y comentarios
			totales, me encargo de pedir todos los favoritos que tenga
			un usuario pero añadiendo la condicion de que debe ser
			de un post especifico.*/
			$sqlFavsPost="SELECT favoritos.idFavorito FROM Mensajeria_Web.favoritos WHERE favoritos.idUsuario='".$row["idUsuario"]."' AND favoritos.idPost='".$row["idComent"]."'";
			$resFavPost= mysqli_query($con,$sqlFavsPost);
			$filas= mysqli_num_rows($resFavPost);
			echo"<h2>".$filas."</h2>";

					/*Utilizando el dato almacenado en el objeto $_SESSION,
					evito que el usuario pueda acceder a su propio perfil, ya que
					ya está en este, para esto creo "a"s con distinta referencia.
					para aquellos comentarios no hechos por el usuario, el nombre
					es un link que lo envía al perfil de este usuario, mandando el
					id del usuario especifico por medio del link*/
					if($row["idUsuario"]==$_SESSION["username"]){
						echo"<a href='#'>".$row["nombre"]."</a>";
					}else{
						echo"<a href='perfilUsuario.php?idUsuario=".$row["idUsuario"]."'>".$row["nombre"]."</a>";
					}
					echo"<div class='fotoPerfil'>";
					echo"<figure>";
					echo"<img src=".$row["imagen"].">";
					echo"</figure>";
					echo"</div>";
					echo"<p>".$row["comentario"]."</p>";

					echo"<div id='accionesUsuario'>";
					echo"<a href='#'>Dar</a>";
					echo"<figure>";
					echo"<img src='images/YStar.png'>";
					echo"</figure>";

					echo"<a href='#'>Reportar Post</a>";
					echo"<figure>";
					echo"<img src='images/report.png'>";
					echo"</figure>";
					echo"</div>";
					echo"<hr>";
					echo"</article>";
				}

				?>
			</section>
		</body>


		</html>
