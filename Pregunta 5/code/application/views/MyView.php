<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>INF-324</title>

	<style type="text/css">

	<style type="text/css">
		*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}
h3{
	color: white;
	padding-left: 10px;
}
input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
input[type=submit].fuera{
	margin-left: 5%;

}
/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}

	
	</style>
</head>
<body>
<h1> Docentes </h1>
<div class="table-wrapper">
<table class="fl-table">
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

		echo("<form method='POST' action='".base_url('Lectura/editdoc?estado=editar')."')>");
		echo ("<input type='hidden' name='ci' value='".$datodoc->ci."'>");
		echo("<input type='submit' value='Editar'>");
		echo("</form>");
		echo "</td>";
		echo "<td>";
		echo("<form method='POST' action='".base_url('Lectura/confirelimdoc')."')>");
		echo ("<input type='hidden' name='ci' value='".$datodoc->ci."'>");
		echo ("<input type='hidden' name='nombre' value='".$datodoc->nombre."'>");
		echo("<input type='submit' value='Eliminar'>");
		echo("</form>");
		echo "</td>";
	}
?>
</tbody>
</table>
</div>
<form action=<?php echo base_url('Lectura/adddoc');?> method="GET">
<input type="hidden" name="estado" value="nuevo">
<input type="submit" value="Agregar" class="fuera">
</form>
</body>
</html>