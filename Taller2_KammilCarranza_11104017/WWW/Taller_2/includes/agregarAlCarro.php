<?php session_start(); ?>
<html>
<head>
	<title></title>
</head>
<body>

<!-- En esta seccion me encargo de agregar los objetos que no existan al carrito
esto lo hago validando el id del producto que se quería añadir y seleccionando
los id's de los productos que coincidan con este. De esta forma agrego
siempre y cuando no encuentre ninguno parecido. Para ambos casos, es
redireccionado al final devuelta al home -->
<?php
include_once("database.php");
if(isset($_GET["idProducto"])){ 
	$idAlmacenado= $_GET["idProducto"];
	$sqlValidacion= "SELECT carrito.idProducto FROM tiendaVirtual.carrito WHERE carrito.idProducto='".$idAlmacenado."' AND carrito.idUsuario='".$_SESSION["username"]."'";
	$resValidacion=mysqli_query($con,$sqlValidacion);
	if(mysqli_num_rows($resValidacion)<1){
		$sql="INSERT INTO tiendaVirtual.carrito(`idUsuario`, `idProducto`) VALUES ('".$_SESSION["username"]."','$idAlmacenado')";
		$comunicacion=mysqli_query($con,$sql);
	}
	echo"<meta http-equiv='refresh' content='0.5;url=/Taller_2/index.php'>";
}
?>
</body>
</html>