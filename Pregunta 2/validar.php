


<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$carrera=$_POST['carrera'];

session_start();
$_SESSION['usuario']=$usuario;
include('conection.php');

$consulta="SELECT*FROM usuario WHERE usuario='$usuario' and password='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

if(!empty($resultado) and mysqli_num_rows($resultado)>0){
	include ("sesion.php");
}else{
	 ?>
	 <?php
	 	include("index.php");
	 ?>
	 	<script type="text/javascript">
	 		window.alert("Usuario o contraseña incorrecta")
	 	</script>
	 <?php

}
mysqli_free_result($resultado);
mysqli_close($conn);
?>


