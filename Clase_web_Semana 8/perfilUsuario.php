<!-- En esta pagina, utilizo exactamente la misma sintaxis y datos que utilicé en la pagina de index. 
La única diferencia es que en el header el id es obtenido mediante $_GET ya que es el que se pasó desde el 
link al perfil del usuario en el index. Por esto no utilizo sesiones y por lo tanto el usuario no puede hacer 
click en ningún otro link de perfiles de comentarios ya que aparecen sólo los comentarios realizados por este.
 Al final agregué un texto de regresar con link para volver al menú de home -->

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
		include_once("includes/database.php");
		if(isset($_GET["idUsuario"])){ 
			$idAlmacenado= $_GET["idUsuario"];
			$sql="SELECT usuarios.nombre AS nombre, usuarios.idUsuario AS idUsuario, usuarios.urlImg AS imagen  FROM Mensajeria_Web.usuarios WHERE usuarios.idUsuario='".$idAlmacenado."'";
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

			$sqlDatos="SELECT usuarios.idUsuario AS idUsuario, usuarios.nombre AS nombre, usuarios.urlImg AS imagen, usuarios.bgColor AS bgColor, comentarios.elComentario AS comentario, comentarios.id AS idComent FROM Mensajeria_Web.usuarios JOIN Mensajeria_Web.comentarios ON usuarios.idUsuario= comentarios.idUsuario WHERE usuarios.idUsuario='".$idAlmacenado."'";
			$resDatos=mysqli_query($con,$sqlDatos);

			while ($row=mysqli_fetch_array($resDatos)) {
				echo"<article style='background-color:".$row["bgColor"]."'>";
				echo"<figure>";
				echo"<img id='estrellas' src='images/YStars.png'>";
				echo"</figure>";

				$sqlFavsPost="SELECT favoritos.idFavorito FROM Mensajeria_Web.favoritos WHERE favoritos.idUsuario='".$row["idUsuario"]."' AND favoritos.idPost='".$row["idComent"]."'";
				$resFavPost= mysqli_query($con,$sqlFavsPost);
				$filas= mysqli_num_rows($resFavPost);
				echo"<h2>".$filas."</h2>";
				
				echo"<a href='#'>".$row["nombre"]."</a>";
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

		}

		?>
	</section>

	<footer>
		<a href="index.php">Regresar</a>
	</footer>
</body>


</html>
