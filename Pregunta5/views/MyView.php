<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
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
<h1> Docentes </h1>

<table>
	<thead>
		<th class="header">CI</th>
		<th class="header">Usuario</th>
		<th class="header">Grado</th>
		<th class="header">Nombre</th>
		<th class="header">Fecha de Nacimiento</th>
		<th class="header">cod dpto</th>
		<th class="header">Departamento</th>
		<th class="header">Editar</th>
		<th class="header">Eliminar</th>
	</thead>
<tbody>
<?php

	echo '<br>';

	foreach($unidos as $datodoc)
	{
		echo "<tr>";
		echo("<td>".$datodoc->ci."</td>");
		echo("<td>".$datodoc->Usuario."</td>");
		echo("<td>".$datodoc->grado."</td>");
		echo("<td>".$datodoc->nombre."</td>");
		echo("<td>".$datodoc->fecha_de_nacimiento."</td>");
		echo("<td>".$datodoc->departamento."</td>");
		echo("<td>".$datodoc->dpto."</td>");
		echo "<td>";
		echo("<a href='adddoc?estado=viejo&ci=".$datodoc->ci."'>Editar</a>");
		echo "</td>";
		echo "<td>";
		echo("<a href='eliminardoc.php? ci=".$datodoc->ci."'>Eliminar</a>");
		echo "</td>";
		echo "</tr>";
	}
?>
</tbody>
</table>
<form action="adddoc" method="GET">
<input type="hidden" name="estado" value="nuevo">
<input type="submit" value="Agregar">
</form>
</body>
</html>