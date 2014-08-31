<?php
/* Program: mysql_test.php
* Desc: Connects to MySQL Server and * outputs settings.
*/

include_once("includes/database.php");

/*Esta página se encarga de mostrar todas las notas, junto con su nombre y porcentajes.
*/
$sql= "SELECT * FROM estudiantesWeb.notas ORDER BY idNota";
$result = mysqli_query($con,$sql);
if($result == false)
{
	echo "<h4>Error: ".mysqli_error($con)."</h4>";
} else
{
	if(mysqli_num_rows($result) < 1)
	{
		echo "<p>No current databases</p>";
	} else
	{
		while($row = mysqli_fetch_array($result)) {
			echo $row["nombre"]." ".$row["porcentaje"]."%";
			echo"<br>";
			echo"<br>";
		}
	}
} ?>
</body></html>