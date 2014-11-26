  <?php
  include_once('database.php');

  /*ME encargo de recoger lo que llega del metodo POST y con esto hago un query que 
  se encarga de seleccionar todas las locaciones que tengan el tipo del ícono que se arrastró al canvas.*/
  $marcador = $_POST['marcador'];
  $result="";
  $tmp=[];
  $query = "SELECT * FROM locs.locaciones WHERE locaciones.tipo ='".$marcador."'";
  $resultado = mysqli_query($con,$query);
  
//Creo variables temporales que voy agregando al arreglo y luego creo la clase temps a la cual pertenecen estas variables.
  while ( $row = mysqli_fetch_array($resultado) ) {
    $temp['id'] = $row["id"];
    $temp['lat'] = $row["latitud"];
    $temp['lon'] = $row["longitud"];
    $temp['nom'] = $row["nombre"];
    array_push($tmp,$temp);
  }
  $result["temps"] = $tmp;

  echo  json_encode($result);

  ?>
