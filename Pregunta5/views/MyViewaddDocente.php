<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>INF-324</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	
	</style>
</head>
<body>
<h1> Añadir docente</h1>

<?php 

	echo($_GET['estado']);
	if($_GET['estado']=="nuevo"){
		$ci="";
		$nombre="";
		$usuario="";
		$contraseña="";
		$nombre="";
		$fechanac="";
		$coddep="";
		$aceptar="nuevo";
	}else{
	    $ci=$_GET['ci'];
		$consulta=$db->query("SELECT docente.ci, usuario.Usuario,usuario.password, docente.grado, persona.nombre, persona.fecha_de_nacimiento, persona.departamento, case persona.departamento when '01' then 'Chuquisaca' when '02' then 'La Paz' when '03' then 'Cochabamba' when '04' then 'Oruro' when '05' then 'Potosí' when '06' then 'Tarija' when '07' then 'Santa Cruz' when '08' then 'Beni' when '09' then 'Pando' end as dpto FROM usuario, docente, persona WHERE docente.ci=usuario.ci and usuario.ci=persona.ci ");
		$nombre="";
		$usuario="";
		$contraseña="";
		$nombre="";
		$fechanac="";
		$coddep="";
		$aceptar="Actualizar";
	}

?>
<form method="POST" action=" insertdocente">

<?php
	echo("<input type='hidden' name='caso' value='".$aceptar."'>");
	echo("<p>CI:    <input type='text' name='ci' value='".$ci."'></p>");
	echo("<p>Usuario:<input type='text' name='usuario' value='".$usuario."'></p>");
	echo("<p>Contraseña:<input type='password' name='contraseña' value='".$contraseña."'></p>");
	echo("<p>Nombre:<input type='text' name='nombre' value='".$nombre."'></p>");
	echo("<p>Grado:<input type='text' name='grado' value='".$nombre."'></p>");
	echo("<p>Fecha de Nacimiento:<input type='date' name='fecha_de_nacimiento' value='".$fechanac."'></p>");
	echo("<p>departamento(num):<input type='text' name='departamento' value='".$coddep."'></p>");
	echo("<input type='submit'  value='".$aceptar."'>");
?>
	
</form>


</body>
</html>