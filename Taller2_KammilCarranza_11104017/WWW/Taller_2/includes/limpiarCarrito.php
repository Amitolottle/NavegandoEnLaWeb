<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include_once("database.php");
	// Este es el sql clave, me encargo de recorrer todos los productos que hay en el carrito,
	// de estos obtengo el idProducto y el idUsuario. Luego me encargo de añadir cada producto
	// a las compras del usuario, para que estas queden registradas con la fecha actual.
	// Por último, me encargo de limpiar el carrito para que se siga comprando.
	$sqlProductos="SELECT carrito.idProducto AS idProducto, carrito.idUsuario AS idUsuario FROM tiendaVirtual.carrito";
	$resProductos=mysqli_query($con,$sqlProductos);
	while($row= mysqli_fetch_array($resProductos)){
		$sqlComprar="INSERT INTO tiendaVirtual.compras(`idProducto`, `idUsuario`, `fecha`) VALUES ('".$row["idProducto"]."','".$row["idUsuario"]."', CURDATE()) ";
		$resComprar=mysqli_query($con,$sqlComprar);
	}
	$sql= "DELETE FROM tiendaVirtual.carrito WHERE 1";
	$comunicacion=mysqli_query($con,$sql);
	echo"<meta http-equiv='refresh' content='0.5;url=/Taller_2/index.php'>";

	?>
</body>
</html>