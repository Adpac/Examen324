<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
	<style type="text/css">
            
            header {
    width:100%; /* Establecemos que el header abarque el 100% del documento */
    overflow:hidden; /* Eliminamos errores de float */
     background-image: url("Matematica.jpg");

    margin-bottom:20px;
}

.wrapper {
    width:100%; /* Establecemos que el ancho sera del 90% */
    max-width:1000px; /* Aqui le decimos que el ancho máximo sera de 1000px */
    margin:auto; /* Centramos los elementos */
    overflow:hidden; /* Eliminamos errores de float */
}

body{
    background-color: rgba(143, 172, 179, 1);
}
p,h1,h2,h3{

    color: white;
}

.contenido {
  heigh:665px;
     background:#3D77C3;
  background-repeat: repeat-y;
  background-size: 100%;
}
.texto{
    padding: 10%;
}
.oscurecer{
     background-color: rgba(0, 0, 0, 0.5);
}

header .logo {
    color:#f2f2f2;
    font-size:50px;
    line-height:150px;
    float:left;
}
div .logofac{
    padding-left: 50px;
    width: 150px;
}

header nav {
    float:right;
    line-height:100px;
}

header nav a {
    display:inline-block;
    color:#fff;
    text-decoration:none;
    padding:5px 10px;
    line-height:normal;
    font-size:20px;
    font-weight:bold;
    -webkit-transition:all 500ms ease;
    -o-transition:all 500ms ease;
    transition:all 500ms ease;
}
.pie{
    padding-left: 10%;
     padding-right: 10%;
     padding-top: 2%;
     padding-bottom:2% ;
}
header nav a:hover {
    background:#f56f3a;
    border-radius:50px;
}
        </style>
</head>
<body>
<div class="oscurecer">
<h1>
	Bienvenido
</h1>	
<?php

$usuario=$_POST['usuario'];




include("conection.php");
$consultaci="SELECT ci FROM usuario WHERE usuario='$usuario'";
$resultadoci=mysqli_query($conn,$consultaci);
$cifila = mysqli_fetch_assoc($resultadoci);
$ci=$cifila['ci'];

$consultapersona="SELECT * FROM persona WHERE ci='$ci'";
$resultadopersona=mysqli_query($conn,$consultapersona);
$persona = mysqli_fetch_assoc($resultadopersona);

$consultaestudiante="SELECT * FROM estudiante WHERE ci='$ci'";
$resultadoestudiante=mysqli_query($conn,$consultaestudiante);

if(!empty($resultadoestudiante) and mysqli_num_rows($resultadoestudiante)>0){
///Caso estudiante
	$estudiante = mysqli_fetch_assoc($resultadoestudiante);

	$consultacarrera="SELECT * FROM carrera WHERE cod_carrera='$estudiante[cod_carrera]'";
	$resultadocarrera=mysqli_query($conn,$consultacarrera);
	$carrera = mysqli_fetch_assoc($resultadocarrera);
	echo("<h1> Carrera: ".$carrera['nombre_carrera']."</h1>");
	echo "<h1>Estudiante: ";
	echo($persona['nombre']."</h1>");
?>
	<form action="notas.php" method="post">
		<?php
 		echo("<input type='hidden' name='usuario' value='".$usuario."'/>");
 		 ?>
 		 <input type="submit" value="Ver notas">
	</form>
<?php
	
}else{
	$consultadocente="SELECT * FROM docente WHERE ci='$ci'";
	$resultadodocente=mysqli_query($conn,$consultadocente);
	$docente = mysqli_fetch_assoc($resultadodocente);
	echo("<h1>Docente: ".$docente['grado']." ".$persona['nombre']." </h1>");
	///caso Docente
	echo("<h1>Materia: </h1>");
	
	$consultamateria="SELECT * fROM materia WHERE ci_docente='$persona[ci]'";
	$resultadomateria=mysqli_query($conn,$consultamateria);

	while($fila=mysqli_fetch_array($resultadomateria)){
		echo($fila["sigla"]." ".$fila["nombre_materia"]);
		echo "</br>";
	
	}
	?>
	<form action="notasprom.php" method="post">
		<?php
 		echo("<input type='hidden' name='usuario' value='".$usuario."'/>");
 		 ?>
 		 <input type="submit" value="Ver Promedio notas por departamento">
	</form>
	<?php

}



?>
</div>
</body>
</html>