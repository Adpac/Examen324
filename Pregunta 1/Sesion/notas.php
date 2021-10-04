<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Notas</title>
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


<?php
include('conection.php');
$usuario=$_POST['usuario'];

$consultaci="SELECT ci FROM usuario WHERE usuario='$usuario'";
$resultadoci=mysqli_query($conn,$consultaci);
$cifila = mysqli_fetch_assoc($resultadoci);
$ci=$cifila['ci'];
$consultapersona="SELECT * FROM persona WHERE ci='$ci'";
$resultadopersona=mysqli_query($conn,$consultapersona);
$persona = mysqli_fetch_assoc($resultadopersona);

echo("<h3> Usuario: ".$usuario."</h3>");

echo("<h3> Nombre: ".$persona['nombre']."</h3>");



?>
<h3>Notas: </h3>
<div class="table-wrapper">
<table class="fl-table">
<thead>
		<th class="header">Sigla</th>
		<th class="header">Materia</th>
		<th class="header">paralelo</th>
		<th class="header">Nota 1</th>
		<th class="header">Nota 2</th>
		<th class="header">Nota 3</th>
		<th class="header">Nota final</th>
</thead>	

<tbody>
<?php
	$sql="SELECT * fROM NOTA WHERE ci='$ci'";
	$resultado=mysqli_query($conn,$sql);

	while($fila=mysqli_fetch_array($resultado)){
		echo "<tr>";
		echo("<td>".$fila['Sigla']."</td>");
		$consultamateria="SELECT * FROM materia WHERE sigla='$fila[Sigla]'";
		$resultadomateria=mysqli_query($conn,$consultamateria);
		$materia = mysqli_fetch_assoc($resultadomateria);
		echo("<td>".$materia['nombre_materia']."</td>");
		echo("<td>".$fila['paralelo']."</td>");
		echo("<td>".$fila['Nota1']."</td>");
		echo("<td>".$fila['Nota2']."</td>");
		echo("<td>".$fila['Nota3']."</td>");
		echo("<td>".$fila['Notafinal']."</td>");
		echo "</tr>";

	}
?>	
</tbody>
</table>
</div>
</body>
</html>