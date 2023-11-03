<?php
// Iniciar sesión
session_start();
require_once "functions.php";

///hola/////

//error_reporting(E_ALL);
//ini_set('display_errors', '1');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['usuario'];
    $contra = $_POST['password'];

    $cuenta = validarUsuario($login, $contra);
  
    if ($cuenta == 1) {
        $_SESSION['usuario'] = $login;
        $_SESSION['usuario']['nivel_acceso'] = 1;
        header("Location: dashboard.php");
        exit();
    } else {
        $mensajeError = "Usuario o contraseña incorrectos";
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Herramienta para ScrumMasters">
    <meta name="author" content="Oscar de la Cuesta">

    <title>SCRUM-4-MASTER - Herramienta en la nube para gestión de equipos con SCRUM</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/estilo-entrada.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<style>

        html, body {
            margin: 0;
            padding: 0;
            background-color: black;
            height: 100%;
        }

        body {
            background-image: url(http://www.scrum-master.es/imagenes/fondo.gif);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.7);
        }
        .container {
            /* Estilos adicionales para el contenedor */
        }
        /* Otros estilos CSS */
    </style>

</head>







<body>
   <div class = "container">
	<div class="wrapper">
		<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading"><img src="imagenes/scrum-4-master.png"/><br/></h3>

			Herramienta en la nube para la gestión de equipos ágiles y todos los agentes implicados.
			 <hr class="colorgraph"><br>
			  <input type="text" class="form-control" name="usuario" placeholder="usuario" required="" autofocus="" />
		         <div style="text-align: right; font-size: 9px;color:#00000F; margin-top: -10px; margin-bottom:10px;">&nbsp;</div>
			  <input type="password" class="form-control" name="password" placeholder="password" required=""/> 
			  <div style="text-align: right; font-size: 10px;color:#00000F; margin-top: -10px; margin-bottom:10px;">by <a href="https://palentino.es" target="_blank"> palentino.es </a></div>	  		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Entrada</button>  
                <div > <?php echo $mensajeError ?></div>
                <div style = "text-align:center;margin-top:10px;"> <a href ="https://scrumguides.org/docs/scrumguide/v2020/2020-Scrum-Guide-Spanish-European.pdf" target="_blank">Basado en la guía oficial de SCRUM - Nov 2020 </a> </div>
		</form>			
	</div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
