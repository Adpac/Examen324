<?php
$conn =mysqli_connect("localhost","usuario324","123456");
mysqli_select_db($conn,"bdadel");
/*
$sql="select * from materia";
$resultado=mysqli_query($conn,$sql);

while($fila=mysqli_fetch_array($resultado)){
	echo($fila["sigla"]." ".$fila["nombre_materia"]);
	echo "</br>";
}
*/
?>