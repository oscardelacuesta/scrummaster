<?php
session_start();
require_once "config.php";

function validarUsuario($login, $contra) {
   global $servername, $username, $password, $dbname;
//echo  $servername . " ".  $username . " "  . $password . " " . $dbname;
   $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error){
        die("Error de conexión: " . $conn->connect_error);
    }
        else
            { 
               // echo "Ha conectado.";
    }
    

    $login = $conn->real_escape_string($login);

    
       
    $query = "SELECT COUNT(*) as cuenta FROM usuarios WHERE usuario = '$login' AND password = '$contra'";
   $result = $conn->query($query);

   if ($result) {
    $row = $result->fetch_assoc();
    $cuenta = $row['cuenta'];

    return $cuenta;
  } else {
    // Manejo del error en caso de que la consulta falle
  }





    $conn->close();

    return null;
}

function validarAcceso($nivelRequerido) {
    if (!isset($_SESSION['usuario'])) {
      //  header("Location: index.php");
        //exit();
    }

    $nivelUsuario = $_SESSION['usuario'];
    //echo "El nivel es " . $nivelUsuario;

    if ($nivelUsuario < $nivelRequerido) {
        header("Location: acceso_denegado.php");
       exit();
    }  
    return  null;
}
?>
