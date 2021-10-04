<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingreso</title>
	<style type="text/css">
		*{box-sizing:border-box;}
		body{
			background-color: rgba(0.5, 1, 1, 0.3);
		}
		h1{
			color: white;
		}
		h2{
			color: white;
		}
		select{
			color: white;
			background-color: #8E96A3;
			padding: 3px;
			border-radius:3px;
			margin-bottom: 5px;
		}
		#contenedor{
		display: flex;
			background-color: #3274CB;
			padding: 5px;
			margin: 5px;
	
		}

		#imagen{
			width: max-size;
			
			text-align: right;
			float: right;
			background-color: white;
			height: 200px;
		}
		#imagen img{
			width: auto;
			height: 100%;
		float: right;
		}
		#datos{
			padding-left: 5px;
			width: 50%;

			margin: 5px;
		}
		form{
		width:300px;
		padding:16px;
		border-radius:10px;
		margin:auto;
		background-color:#2b85cd;
		}
		form label{
			width:72px;
			font-weight:bold;
			display:inline-block;
		}
		form input[type="text"],
		form input[type="password"]{
			width:180px;
			padding:3px 10px;
			border:1px solid #f6f6f6;
			border-radius:3px;
			background-color:#f6f6f6;
			margin:8px 0;
			display:inline-block;
		}
		form input[type="submit"]{
			width:100%;
			padding:8px 16px;
			margin-top:32px;
			border:1px solid #000;
			border-radius:5px;
			display:block;
			color:#fff;
			background-color:#000;
		} 
		form p{
			color: white;
		}
	</style>
</head>
<body>
<div id="contenedor">
<?php
	include("conection.php");
?>
<div id="imagen">
	<img src="monoblock.jpg">
</div>
<div id="datos">
<h1>Facultad de Ciencias Puras y naturales</h1>	
<?php
	$sql="select * from facultad";
	$resultado=mysqli_query($conn,$sql);
	echo "<select name='facultad'>";
	while($fila=mysqli_fetch_array($resultado)){
	echo ("<option value='".$fila["cod_fac"]."'>".$fila["nombre_facultad"]."</option>");
}
	echo"</select>";

?>
</div>

</div>
  <form action="validar.php" method="post">
<h2 id='carselect' name="carrera">Carrera: Física</h2>
<?php
	$sql="select * from carrera";
	$resultado=mysqli_query($conn,$sql);
	echo "<select id='selectcarrera' name='carrera' onchange='cambiartexto();'>";
	while($fila=mysqli_fetch_array($resultado)){
	echo ("<option value='".$fila["cod_carrera"]."'>".$fila["nombre_carrera"]."</option>");
}
	echo"</select>";

?>



<br>
 
      <p>Usuario		
      <input name="usuario" type="text"></p>
      <p>Contraseña
      <input name="contraseña" type="password">
      </p>	
      <input type="submit" value="Envar">
    </form>
<script type="text/javascript">
	function cambiartexto(){
		var opcion=document.getElementById('selectcarrera');
		var carreraescogida=opcion.options[opcion.selectedIndex].text;
		document.getElementById('carselect').innerText="Carrera: "+carreraescogida;

	}
</script>
</body>
</html>