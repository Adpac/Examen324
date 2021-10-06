<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			background-color:#0F3B8C;
		}
	a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;

}
h1,h3{
	padding: 3%;
}
input[type=submit] {
	margin: 5px;
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
    #div_contenedor{
        background: crimson;
        height: 100vh;
    }
    /* declaramos un color, un ancho y una altura*/
    #div_centrado{
        width: 600px;       
        height: 400px;
        position: absolute;
        top:20%;
        left: 35%;           
        margin-top: -100px;
        margin-left: -100px;
        background-color: #218DB8;

    }
    #respuesta{
    	left: 50%;
    	margin-left: 200px;
    	padding-left: 30%;
    	padding: 3px;
    	display: flex;
    }
    button{
    	margin: 5px;
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
    }
	</style>
</head>
<body>

<div id="div_centrado">
<h1 >Operacion Exitosa</h1>
<?php
	$mensaje=$inf;

	echo("<h3>".$mensaje."<h3>");
?>

<a href="<?php echo base_url()?>" class="button">
	 <button>Aceptar</button>
</a>
</div>
</body>
</html>