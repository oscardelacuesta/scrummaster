<?php
   phpinfo();
   
  $host_name = 'db5013050230.hosting-data.io';
  $database = 'dbs10957667';
  $user_name = 'dbu1132815';
  $password = 'Sc2016ent';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
  }
?>