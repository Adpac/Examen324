<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>INF-324</title>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
button {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
	body {
		background-color:#0F3B8C;

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
*{box-sizing:border-box;}

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
		width:500px;
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
			float: right;
			background-color:#000;
		} 
		form p{
			color: white;
			size: 10px;
			padding: 5px;
			margin-right: 5px;
		}
	
	</style>
</head>
<body>


<?php 

	$departamentos=array(
		"01"=>"Chuquisaca",
		"02"=>"La Paz",
		"03"=>"Cochabamba",
		"04"=>"Oruro",
		"05"=>"Potosí",
		"06"=>"Tarija",
		"07"=>"Santa Cruz",
		"08"=>"Beni",
		"09"=>"Pando"
	);

	
	if($_GET['estado']=="nuevo"){
		echo("<h1>Agregar</h1>");
		$ci="";
		$nombre="";
		$usuario="";
		$contraseña="";
		$nombre="";
		$grado="";
		$fechanac="";
		$coddep="01";
		$aceptar="nuevo";
	}else{
		echo("<h1>Editar</h1>");
	    $ci=$docente['ci'];		
		$nombre=$docente['nombre'];	
		$usuario=$docente['Usuario'];	
		$contraseña=$docente['password'];	
		$grado=$docente['grado'];	
		$fechanac=$docente['fecha_de_nacimiento'];	
		$coddep=$docente['departamento'];
		$nomdep=$docente['dpto'];	
		$aceptar="Actualizar";
	}

?>
<form method="POST" action="<?php echo base_url("Lectura/insertoeditdocente")?>">

<?php
	echo("<input type='hidden' name='clave' value='".$ci."'>");
	echo("<input type='hidden' name='caso' value='".$aceptar."'>");
	echo("<p>CI:_________________<input type='text' name='ci' value='".$ci."'></p>");
	echo("<p>Usuario:____________<input type='text' name='usuario' value='".$usuario."'></p>");
	echo("<p>Contraseña:_________<input type='password' name='contraseña' id='password' value='".$contraseña."'>");
	echo("<button class='btn btn-primary' type='button' onclick='mostrarContrasena()''>Mostrar</button></p>");
	echo("<p>Nombre:_____________<input type='text' name='nombre' value='".$nombre."'></p>");
	echo("<p>Grado:______________<input type='text' name='grado' value='".$grado."'></p>");
	echo("<p>Fecha de Nacimiento:__<input type='date' name='fecha_de_nacimiento' value='".$fechanac."'></p>");
?>
	<select name="departamento">
		<?php
			foreach ($departamentos as $key => $value) {
				if($key==$coddep){
					echo("<option value='".$key."' selected>(".$key.") ".$value."</option>");
				}else{
					echo("<option value='".$key."'>(".$key.") ".$value."</option>");
				}
		
				// code...
			}
		?>
	</select>
<?php	
	echo("<br>");

	echo("<input type='submit'  value='".$aceptar."'>");
?>
	
</form>

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
</body>
</html>